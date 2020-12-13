<?php
/* Smarty version 3.1.30, created on 2020-12-13 19:26:34
  from "/usr/share/nginx/html/app/CalcView.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fd66aea5c3123_16640724',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef159025268ea8b57cf2496794bf7953b8d6d201' => 
    array (
      0 => '/usr/share/nginx/html/app/CalcView.html',
      1 => 1607887520,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/main.html' => 1,
  ),
),false)) {
function content_5fd66aea5c3123_16640724 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10429656575fd66aea590f50_31980106', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14614516775fd66aea5c2a39_40676069', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../templates/main.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_10429656575fd66aea590f50_31980106 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_14614516775fd66aea5c2a39_40676069 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


		<h2>Kalkulator kredytowy</h2>
	
		<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" method="post">
			<fieldset>
				<label>Kwota kredytu: </label>
				<input type="number" placeholder="Kwota pozyczki" min="1" name="loanAmount" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->loanAmount;?>
"/><br/>
				<label>Na ile lat: </label>
				<input type="number" min="1" placeholder="Ilosc lat" name="loanYears" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->loanYears;?>
"/><br/>
				<label>Oprocentowanie: </label>
				<input type="number" min="1" placeholder="Oprocentowanie" name="interest" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->interest;?>
"/><br/>
			</fieldset>
			<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
		</form>

		<div class="messages">
			<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
			<h4>Wystąpiły błędy: </h4>
			<ol class="err">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
				<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</ol>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
			<h4>Informacje: </h4>
			<ol class="inf">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
				<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</ol>
			<?php }?>

			<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
			<h4>Wynik</h4>
			<p class="res">
				Miesięczna rata: <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>
 zł
			</p>
			<?php }?>

		</div>

		<?php
}
}
/* {/block 'content'} */
}
