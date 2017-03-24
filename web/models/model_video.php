<?

class Model_Video extends Model
{
	protected $query;


	public function __construct ($db){
		parent::__construct($db);
	}

	public function getArticlesByCategoryId ($id, $imgtype) {
		$articles=[];
		$articles=Articles::getArticlesByCategoryId( $this->db, $id, $imgtype);
		return $articles;
  	}

  	public function getArticleByArticleId ($id, $imgtype) {
		$articles=[];
		$articles=Articles::getArticleByArticleId( $this->db, $id, $imgtype);
		return $articles;
  	}

  	public function getRecentArticles ( $imgtype, $globaldataMenu=null) {
		$articles=[];
		$articles=Articles::getRecentArticles( $this->db,  $imgtype, $globaldataMenu);
		return $articles;
  	}
}
?>