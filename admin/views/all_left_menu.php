<ul id="accordion" class="accordion">
<?//var_dump($menu)?>
	<?for ($i=0; $i <=count($menu)-1 ; $i++) {?>
		<li>

			<div class="link">
				<!--i class="fa fa-chevron-down"></i></div-->
				<?if ((isset($menu[$i]["sub_menu"])) && (count($menu[$i]["sub_menu"])>0)){// если есть подменюшки ?>
					<i class=<? echo "\"fa fa-".$menu[$i]["logo"]."\"";?>></i><?echo $menu[$i]["ru_name"];?>
					<i class="fa fa-chevron-down"></i></div>
					<ul class="submenu">
						<?for ($j=0; $j <=count($menu[$i]["sub_menu"])-1 ; $j++) {?>						
							<li>
								<i class=<? echo "\"fa fa-".$menu[$i]["sub_menu"][$j]["logo"]."\"";?>></i> 
						 		<a href=<?echo "\"".$menu[$i]["sub_menu"][$j]["url"]."\"";?>>
						 			<?echo $menu[$i]["sub_menu"][$j]["ru_name"];?>
						 		</a>
						 	</li>
						<?}?>
					</ul>
				<?} else {?>
				<a href=<?echo "\"/".$menu[$i]["url"]."\"";?> class="left_menu_a_href">
					<i class=<? echo "\"fa fa-".$menu[$i]["logo"]."\"";?>></i><?echo $menu[$i]["ru_name"];?>
				</a>
				</i></div>
				<?}?>
		</li>
	<?}?>
</ul>

<script>
	// $(function() {
	// 	var Accordion = function(el, multiple) {
	// 		this.el = el || {};
	// 		this.multiple = multiple || false;

	// 		var links = this.el.find('.link');
	// 		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	// 	}

	// 	Accordion.prototype.dropdown = function(e) {
	// 		var $el = e.data.el;
	// 		$this = $(this),
	// 		$next = $this.next();

	// 		$next.slideToggle();
	// 		$this.parent().toggleClass('open');

	// 		if (!e.data.multiple) {
	// 			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
	// 		};
	// 	}

	// 	var accordion = new Accordion($('#accordion'), false);
	// });
</script>