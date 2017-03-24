<?
// модель для словарика
class Model_Vocabulary extends Model
{
	
	protected $query;

// конструктор
	public function __construct ($db){
		parent::__construct($db);
	}
// получаем все статьи по ид категории
	public function getArticlesByCategoryId ($id, $imgtype) {
		$articles=[];
		$articles=Articles::getArticlesByCategoryId( $this->db, $id, $imgtype);
		return $articles;
  	}
// получаем статью по ее ид
  	public function getArticleByArticleId ($id, $imgtype) {
		$articles=[];
		$articles=Articles::getArticleByArticleId( $this->db, $id, $imgtype);
		return $articles;
  	}
// получить последние добавленные
  	public function getRecentArticles ( $imgtype, $globaldataMenu=null) {
		$articles=[];
		$articles=Articles::getRecentArticles( $this->db,  $imgtype, $globaldataMenu);
		return $articles;
  	}

}
?>