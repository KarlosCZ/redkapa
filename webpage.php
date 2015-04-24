<?
const DEFAULT_TITLE = "No title.";

//Pridal jsem komentar
class Component
	{
	protected $tag_name = "";
	protected $attributes = array();
	protected $tags = array();
	function __construct($tag_name)
	{
		$this->tag_name = $tag_name;
	}
	function addAttribute($key, $value)
	{
		$this->attributes[$key] = $value; 
	}
	function addComponent($tag)
	{
		$this->tags[] = $tag;
	}	
	
	function render()
	{
		$result = "<$this->tag_name";
		foreach($this->attributes as $key=>$value)
		{
			$result .= " $key=\"$value\"";
		}
		$result .= ">";
		foreach($this->tags as $tag)
		{
			$result .= $tag->render();
		}
		$result .= "</$this->tag_name>";
		return $result;
	}
}
 


 
class WebPage
{
	protected $title = "";
	function __construct($title = DEFAULT_TITLE)
	{
		$this->title = $title;
	}
	function render()
	{
		$meta = new Component("meta");
		$meta->addAttribute("charset", "utf-8");
		$head = new Component("head");
		$head->addComponent($meta);
		return $head->render();
	}
}

function basic_test()
{
	$page = new WebPage("test");
	print($page->render());
}
basic_test();




?>
