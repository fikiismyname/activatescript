<!-- <h4 class="c-sidebar__title">Halaman</h4> -->

<li class="c-sidebar__item">
	<a class="c-sidebar__link dashboard" href="./">
		<i class="fa fa-home u-mr-xsmall"></i>Dashboard
	</a>
</li>

<?php if ($_SESSION['akses'] == 'Admin'): ?>
<li class="c-sidebar__item">
	<a class="c-sidebar__link" href="?module=user">
		<i class="fa fa-mouse-pointer u-mr-xsmall"></i>User
	</a>
</li>
<?php endif ?>

<?php if ($_SESSION['akses'] == 'User'): ?>
<li class="c-sidebar__item">
	<a class="c-sidebar__link" href="?module=userchild">
		<i class="fa fa-mouse-pointer u-mr-xsmall"></i>User
	</a>
</li>
<?php endif ?>

<?php if ($_SESSION['akses'] == 'User'): ?>
<li class="c-sidebar__item">
	<a class="c-sidebar__link" href="?module=userchildtemplate">
		<i class="fa fa-mouse-pointer u-mr-xsmall"></i>User Template
	</a>
</li>
<?php endif ?>

<?php if (empty($_SESSION['akses'])): ?>
<li class="c-sidebar__item">
	<a class="c-sidebar__link" href="?module=license">
		<i class="fa fa-mouse-pointer u-mr-xsmall"></i>License Master
	</a>
</li>
<?php endif ?>

<?php if ($_SESSION['akses'] == 'User'): ?>
<li class="c-sidebar__item">
	<a class="c-sidebar__link" href="?module=template">
		<i class="fa fa-mouse-pointer u-mr-xsmall"></i>Template Master
	</a>
</li>
<?php endif ?>