<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 mb-5">

<div class="col-md-3">
    <div class="card">
        <a href="total-os.php">
            <div class="card-head">
                <h2 class="card-title mb-4"><?= $totalAbertas ?></h2>
                <span class="clipBoard"><i class="bi bi-clipboard"></i></span>
            </div>
            <div class="card-progress">
                <small>TOTAL O.S</small>
                <div class="card-indicator">
                    <div class="indicator one"></div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="col-md-3">
    <div class="card">
        <a href="abertas.php">
            <div class="card-head">
                <h2 class="card-title mb-4"><?= $abertas ?></h2>
                <span class="clipBoard"><i class="bi bi-clipboard"></i></span>
            </div>
            <div class="card-progress">
                <small>ABERTAS</small>
                <div class="card-indicator">
                    <div class="indicator one"></div>
                </div>
            </div>
        </a>
    </div>
</div>



<div class="col-md-3">
    <div class="card">
        <a href="concluidas.php">
            <div class="card-head">
                <h2 class="card-title mb-4"><?= $osFinalizada ?></h2>
                <span class="check"><i class="bi bi-check-circle"></i></span>
            </div>
            <div class="card-progress">
                <small>CONCLUÍDAS</small>
                <div class="card-indicator">
                    <div class="indicator three" style="width: <?= $progressoConcluido ?>%;"></div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="col-md-3">
    <div class="card">
        <a href="clientes.php">
            <div class="card-head">
                <h2 class="card-title mb-4"><?= $clientes ?></h2>
                <span class="people"><i class="bi bi-users"></i></span>
            </div>
            <div class="card-progress">
                <small>CLIENTES</small>
                <div class="card-indicator">
                    <div class="indicator four"></div>
                </div>
            </div>
        </a>
    </div>
</div>
</div>
