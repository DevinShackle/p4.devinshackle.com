<?php
class news_controller extends base_controller {

	public function __construct() {
		parent::__construct();

		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			die("Members only. <a href='/users/login'>Login</a>");
		}
	}

	public function add() {

		# Setup view
		$this->template->content = View::instance('v_news_add');
		$this->template->title   = "Make News!";

		#get the user role
		$q = "SELECT user_type
			FROM users
			WHERE user_id = ".$this->user->user_id;

		$user_role = DB::instance(DB_NAME)->select_rows($q);

		$user_role = $user_role[0][user_type];

		# Reader accounts are not allowed to add news!
		if($user_role == "Reader") {
			Router::redirect('/news/error');
		}

		# If we aren't redirected away then render template
		echo $this->template;

	}

	public function p_add() {

		#Sanitize incoming text
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		# Associate this news article with this user
		$_POST['author_id']  = $this->user->user_id;

		# Unix timestamp of when this news article was created / modified
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();

		# Insert
		DB::instance(DB_NAME)->insert('news', $_POST);

		Router::redirect('/news/added');

	}

	public function added() {

		#Setup view
		$this->template->content = View::instance('v_news_added');
		$this->template->title = "News Successfully Added";

		#Render template
		echo $this->template;
	}

	public function edit($news_id) {

		# Search the db for this news_id
		# Retrieve the article's content
		$q = "SELECT headline,exec_summary,body,tags  
			FROM news 
			WHERE news_id = ".$news_id;

		$newsContent = DB::instance(DB_NAME)->select_field($q);

		# Setup view
		$this->template->content = View::instance('v_news_edit');
		$this->template->title   = "Edit Article";
		$this->template->content->newsContent = $newsContent;
		$this->template->content->news_id = $news_id;

		# Render view
		echo $this->template;

	}

	public function delete($news_id = NULL) {
		#Confirm the delete command for article

		# Search the db for this news_id
		# Retrieve the article's content
		$q = "SELECT headline,exec_summary,body,tags
			FROM news 
			WHERE news_id = ".$news_id;

		$toDelete = DB::instance(DB_NAME)->select_field($q);
		
		# Setup view
		$this->template->content = View::instance('v_news_delete');
		$this->template->title   = "Delete Article";
		$this->template->content->toDelete = $toDelete;
		$this->template->content->news_id = $news_id;

		# Render view
		echo $this->template;

	}

	public function p_edit($news_id = NULL) {

		DB::instance(DB_NAME)->update("news", $_POST, "WHERE news_id = ".$news_id);

		Router::redirect('/news/index');
	}

	public function p_delete($post_id = NULL) {

		DB::instance(DB_NAME)->delete('news', "WHERE news_id = ".$news_id);

		Router::redirect('/news/index');


	}

	public function index() {

		# Set up the View
		$this->template->content = View::instance('v_news_index');
		$this->template->title   = "Latest News";

		# Query
		$q = 'SELECT 
				news.news_id,
				news.headline,
				news.exec_summary,
				news.body,
				news.created,
				news.author_id AS news_author_id,
				users.first_name,
				users.last_name
			FROM news
			INNER JOIN users 
				ON news.author_id = users.user_id
			ORDER BY news.created
			LIMIT 5';


		# Run the query, store the results in the variable $news
		$news = DB::instance(DB_NAME)->select_rows($q);

		#get the user role
		$q = "SELECT user_type
			FROM users
			WHERE user_id = ".$this->user->user_id;

		$user_role = DB::instance(DB_NAME)->select_rows($q);


		# Pass data to the View
		$this->template->content->news = $news;
		$this->template->content->user_role = $user_role;

		# Render the View
		echo $this->template;

	}

	public function error() {
		#Setup view
		$this->template->content = View::instance('v_news_error');
		$this->template->title = "Not Authorized";

		#Render template
		echo $this->template;
	}

}