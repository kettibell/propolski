<header>

  <a href="http://" title="PROpolski" rel="home">
   <img src="/web/static/img/logo_n.png" alt="PROpolski">
 </a>

 <!--div id="header-text" -->
 <table>
   <tr>
     <td>
      <div id="pol_h">
        <h2 >Админка PROpolski
          <!-- <a href="http://" title="PROpolski" rel="home">PROpolski</a> -->
        </h2> 
      </div>

      <p id="site-description">Блог о польском языке и Польше</p>
    </td>
    <td>
   
      <?
        if ($_SESSION["auth"]==true && isset($_COOKIE['login'])){
        echo "<a  href=\"profile.".$config["prefix"]."\">Вы вошли как ".$_COOKIE['login']."</a>";
      } else {
        echo "<a  href=\"login.".$config["prefix"]."\">Вход\Регистрация</a>";
      }
      ?>

    </td>
  </tr>
</table>


<!-- </div> -->




</header>