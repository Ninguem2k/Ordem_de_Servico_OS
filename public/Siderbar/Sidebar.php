
<header class="topo">
    <div class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light">
        <div class="container">
            <div class="bx logo icon"><img src="Template/IMG/site_logo.png" alt="alt"/></div>                              
            <a class="navbar-brand" href="index.html">7System</a>
            <i class='bx bx-menu-nav navbar-toggler' id="btnnav""></i>
        </div>
    </div>
</header>
<div class="sidebar">
    <div class="logo-details">
        <div class="bx logo icon"><img src="<?php echo DIRIMG; ?>site_logo.png" /></div>    
        <div class="logo_name">7System</div>
        <i class='bx bx-menu' id="btn" > </i>
    </div>
    <ul class="nav-list">
        <li>
            <i class='bx bx-search'></i>
            <input type="text" placeholder="Procurar..." name="Search">
            <span class="tooltip">Procurar</span>
        </li>
        <div class="scroll-nav">
            <li>
                <a href="../../index.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Configuração</span>
                </a>
                <span class="tooltip">Configuração</span>
            </li>
            <li>
                <a href="<?php echo DIRView; ?>Listar_OS.php">
                    <i class='bx bxs-file' ></i>
                    <span class="links_name">Ordens de serviços</span>
                </a>
                <span class="tooltip">Ordens de serviços</span>
            </li>
            <li>
                <a href="<?php echo DIRView; ?>Selecionar_Client.php">
                    <i class='bx bxs-file-plus'></i>
                    <span class="links_name">Cadastrar OS</span>
                </a>
                <span class="tooltip">Cadastro Ordem de Serviço</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-bar-chart-alt-2' ></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
        </div>
        <li class="profile">
            <div class="profile-details">
                <?php if (isset($rows_usuario['Nome']) && $rows_usuario !== "") { ?>
                    <img src="<?php echo DIRIMG; ?>imagem-de-perfil.png" alt="IMG de perfil">
                <?php } else { ?>
                    <img src="<?php echo DIRIMG; ?>imagem-de-perfil.png" alt="IMG de perfil">
                <?PHP } ?>       
                <div class="name_job">
                    <?php if (isset($rows_usuario['Nome']) && $rows_usuario !== "") { ?>
                        <div class="name"><?php echo $rows_usuario['Nome']; ?></div>
                        <div class="status" style="color: green;">online</div>
                    <?php } else { ?>
                        <div class="status" style="color: gray;">offline</div>
                    <?PHP } ?>                            
                </div>
            </div>                
            <?php echo'<a href="PHP/logout.php?token' . md5($_SESSION['id']) . '"><i class="bx bx-log-out" id="log_out"></i></a>'; ?>                    
        </li>
    </ul>
</div>
<section class="home-section">