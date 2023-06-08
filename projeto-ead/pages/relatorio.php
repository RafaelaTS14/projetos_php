<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(1);

$sql_relatorio = "SELECT r.id, u.nome, c.titulo, r.dtcompra, r.valor FROM relatorio r, usuarios u, cursos c WHERE u.id = r.id_usuario AND c.id = r.id_curso";
$sql_query = $mysqli->query($sql_relatorio) or die($mysqli->error);
$num_relatorio = $sql_query->num_rows;

?>
<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Relatórios</h4>
                    <span>Visualize as compras na plataforma.</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">Relatórios
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Relatórios</h5>
                    <span> Verifique o relatório de compras na plataforma</span>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuário</th>
                                    <th>Curso</th>
                                    <th>Data de compra</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($num_relatorio == 0) { ?>
                                    <tr>
                                        <td colspan="5" scope="row">Nenhuma compra encontrada.</td>
                                    </tr>
                                    <?php } else {

                                    while ($relatorio = $sql_query->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $relatorio['id']; ?></th>
                                            <td><?php echo $relatorio['nome']; ?></td>
                                            <td><?php echo $relatorio['titulo']; ?></td>
                                            <td><?php echo date("d/m/Y H:i", strtotime($relatorio['dtcompra'])); ?></td>
                                            <td>R$ <?php echo number_format($relatorio['valor'], 2, ',', '.'); ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>