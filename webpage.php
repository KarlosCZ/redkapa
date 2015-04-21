<?
const DEFAULT_TITLE = "No title.";

class Tag
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
	function addTag($tag)
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
		$meta = new Tag("meta");
		$meta->addAttribute("charset", "utf-8");
		$head = new Tag("head");
		$head->addTag($meta);
		return $head->render();
	}
}

function basic_tests()
{
	$page = new WebPage("test");
	print($page->render());
}
basic_tests();




?>
