<?php require APP . '/views/include/header.php'; ?>

<div class="row mt-3">
  <div class="col-sm-3 text-center">
    <img id="photo-portrait" class="float-sm-left img-fluid" width="250" src="images/portrait.jpg">
  </div>
  <div id="professor-info" class="col-sm d-flex align-items-center ">
    <p class="mt-sm-0 mt-3 mx-auto mx-sm-0">
      <span id="nome-titulo"><?php echo SITENAME; ?></span>
      <br>
      Professor do <a href="https://ifnmg.edu.br/salinas">IFNMG - <i>Campus</i> Salinas</a> <br />
      Contato: arthur.porto@ifnmg.edu.br <br />
      <a href="https://github.com/arthurfporto" title="GitHub"> <i class="si fab fa-github fa-2x"></i></a>
      <a href="http://lattes.cnpq.br/6320284072508777" title="Currículo Lattes"> <i class="si ai ai-lattes ai-2x"></i></a>
    </p>
  </div>
</div>

<hr />
<h2 id="ensino">Ensino</h2>
<div class="row">

  <?php foreach ($data['cursos'] as $curso) : ?>
    <div class="col-md-6 mb-4">
      <h4>
        <?php echo "$curso->cursoNome <br />"; ?>
      </h4>
      <div class="list-group mb-2">

        <?php foreach ($data['ofertas'] as $oferta) : ?>
          <?php foreach ($data['disciplinas'] as $disciplina) : ?>
            <?php if ($disciplina->disciplinaCurso == $curso->cursoId && $oferta->ofertaDisciplina == $disciplina->disciplinaId) : ?>

              <a <?php echo $oferta->ofertaLink ? "href='$oferta->ofertaLink' class='list-group-item'": "class='list-group-item list-group-item-action'"; ?> class='list-group-item'>
                <?php echo $disciplina->disciplinaNome; ?> <br />
                <small><?php echo $oferta->ofertaPeriodo; ?>/<?php echo $oferta->ofertaAno; ?> - <?php echo $oferta->ofertaCodigo; ?></small>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endforeach; ?>

      </div>
      <!-- <a href="#" class="more-disciplines btn btn-sm btn-info float-right"><b>+</b></a> -->
    </div>

  <?php endforeach; ?>
</div>

<hr />

<h2 id="pesquisa">Pesquisa</h2>

<div class="row">

  <div class="col">
    <div class="list-group mb-4">

      <?php foreach ($data['pesquisas'] as $pesquisa) : ?>
        <a class="list-group-item list-group-item-action">
          <?php echo $pesquisa->projetoDataInicio; ?> - <?php echo $pesquisa->projetoDataFim ?: 'Atual'; ?> <br />
          <i><?php echo $pesquisa->projetoTitulo; ?> <br /></i>
          <small>
            Alunos: <?php echo $pesquisa->projetoAlunos; ?>
            <!-- <br />
            Produção: -->

          </small>
        </a>
      <?php endforeach; ?>
    </div>
    <!-- <a href="#" class="more-disciplines btn btn-sm btn-info float-right"><b>+</b></a> -->

  </div>

</div>

<hr />
<h2 id="extensao">Extensão</h2>
<div class="row mb-5">

  <div class="col">
    <div class="list-group mb-4">

      <?php foreach ($data['extensoes'] as $extensao) : ?>
        <a class="list-group-item list-group-item-action">
          <?php echo $extensao->projetoDataInicio; ?> - <?php echo $extensao->projetoDataFim ?: 'Atual'; ?> <br />
          <i><?php echo $extensao->projetoTitulo; ?> </i> <br />
          <small>
            Alunos: <?php echo $extensao->projetoAlunos; ?>
            <!-- <br />
            Produção: -->

          </small>
        </a>
      <?php endforeach; ?>
    </div>
    <!-- <a href="#" class="more-disciplines btn btn-sm btn-info float-right"><b>+</b></a> -->

  </div>

</div>


<?php require APP . '/views/include/footer.php'; ?>