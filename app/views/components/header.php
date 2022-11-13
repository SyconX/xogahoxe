<header class="cont-header flex">
    <form action=<?= CONTROLLERS_PATH . "/Finder.php" ?> method="post" class="finder flex">
        <input type="text" name="finder" id="find" placeholder=" Buscar...">
    </form>
    <div class="nav flex">
        <ul class="ul-nav flex">
            <li class="li-nav flex"><a class="a-nav" href="/eventos">eventos</a></li>
            <li class="li-nav flex"><a class="a-nav" href="/tienda">tienda</a></li>
            <li class="li-nav flex"><a class="a-nav" href="/juegos">juegos</a></li>
            <li class="li-nav flex"><a class="a-nav" href="/perfil">perfil</a></li>
        </ul>
    </div>
</header>