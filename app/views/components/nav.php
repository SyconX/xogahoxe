<div class="nav flex">
    <ul class="ul-nav flex">
        <li class="li-nav flex"><a class="a-nav" href="/eventos">eventos</a></li>
        <li class="li-nav flex"><a class="a-nav" href="/tienda">tienda</a></li>
        <li class="li-nav flex"><a class="a-nav" href="/juegos">juegos</a></li>
        <?php
            if (isset($_SESSION['userLogin'])) { ?>
        <li class="li-nav flex"><a class="a-nav" href="/perfil">perfil</a></li>
        <?php } else { ?>
        <li class="li-nav flex"><a class="a-nav" data-bs-toggle="modal" data-bs-target="#userModal" href="">acceder</a>
        </li>
        <?php } ?>
    </ul>
</div>