<script
    type="module"
    src="https://cdn.jsdelivr.net/npm/@bufferhead/nightowl@0.0.14/dist/nightowl.js"
></script>
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav right">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome Staff User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="../logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>

      <li class=""><a title="" href="../logout.php"><i class="fas fa-power-off"></i> <span class="text">Logout</span></a></li>
    <li class=""><a title="" href="../logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<script type="module">
    import { createNightowl } from '@bufferhead/nightowl'

    createNightowl({
        defaultMode: 'dark',
        toggleButtonMode: 'newState'
    })
</script>
