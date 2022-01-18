<nav id="left-navi">
    <img src="/public/img/logo.svg">
    <i class="fas fa-bars" id="hamburger-icon"  ></i>
    <ul>
        <li>
            <div class="navi-button-container">
                <a href="#" class="left-navi-button" id="upper-navi-menu">
                    <i class="fas fa-home"></i>
                    myFarm
                </a>
            </div>

        </li>
        <li>
            <div class="navi-button-container">
                <a href="/account" class="left-navi-button">
                    <i class="fas fa-user-circle"></i>
                    account
                </a>
            </div>
        </li>
        <li>
            <div class="navi-button-container">
                <a href="#" class="left-navi-button"><i class="fas fa-bell"></i>
                    notifications</a>
            </div>
        </li>
        <li>
            <form class="logout-form" action="logout" method="POST">
                <button type="submit"  class="logout-button"> <i class="fas fa-sign-out-alt"></i>
                    logout
                </button>
            </form>
        </li>
        <li class="settings">
            <div class="navi-button-container">
                <a href="/settings" class="left-navi-button"><i class="fas fa-cog"></i>
                    settings</a>
            </div>
        </li>
    </ul>

</nav>
