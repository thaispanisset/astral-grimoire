<?php
include('layouts/header.php');

$data_nascimento = $_POST['data_nascimento'] ?? null;
$signos = simplexml_load_file("signos.xml");

if (!$data_nascimento) {
    die("Nenhuma data de nascimento foi informada.");
}

$dataNascimento = DateTime::createFromFormat('!Y-m-d', $data_nascimento);

if (!$dataNascimento || $dataNascimento->format('Y-m-d') !== $data_nascimento) {
    die("Data de nascimento inválida.");
}

function criarData($data, $ano)
{
    $dataCompleta = DateTime::createFromFormat(
        '!d/m/Y',
        $data . '/' . $ano
    );

    return $dataCompleta;
}

$signoEncontrado = null;

if ($signos !== false) {
    foreach ($signos->signo as $signo) {

        $inicio = (string) $signo->dataInicio;
        $fim = (string) $signo->dataFim;

        $ano = (int) $dataNascimento->format('Y');

        $inicioMD = (int) substr($inicio, 3, 2) * 100
            + (int) substr($inicio, 0, 2);

        $fimMD = (int) substr($fim, 3, 2) * 100
            + (int) substr($fim, 0, 2);

        $nascimentoMD = (int) $dataNascimento->format('md');

        if ($inicioMD > $fimMD) {

            if ($nascimentoMD <= $fimMD) {
                $dataInicio = criarData($inicio, $ano - 1);
                $dataFim = criarData($fim, $ano);
            } else {
                $dataInicio = criarData($inicio, $ano);
                $dataFim = criarData($fim, $ano + 1);
            }
        } else {
            $dataInicio = criarData($inicio, $ano);
            $dataFim = criarData($fim, $ano);
        }

        if (
            $dataNascimento >= $dataInicio &&
            $dataNascimento <= $dataFim
        ) {
            $signoEncontrado = $signo;

            $imagensSignos = [
                'Áries'       => 'aries.png',
                'Touro'       => 'taurus.png',
                'Gêmeos'      => 'gemini.png',
                'Câncer'      => 'cancer.png',
                'Leão'        => 'leo.png',
                'Virgem'      => 'virgo.png',
                'Libra'       => 'libra.png',
                'Escorpião'   => 'scorpio.png',
                'Sagitário'   => 'sagittarius.png',
                'Capricórnio' => 'capricorn.png',
                'Aquário'     => 'aquarius.png',
                'Peixes'      => 'pisces.png'
            ];

            break;
        }
    }
}
?>


<body>
    <div class="min-vh-100 d-flex flex-column">

        <header>
            <nav class="navbar bg-dark-grimoire">
                <div class="container">
                    <h1>☽✧☾ Astral Grimoire</h1>
                </div>
            </nav>
        </header>

        <main class="flex-grow-1 m-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8">

                        <div class="form-box text-center">

                            <?php if ($signoEncontrado): ?>

                                <p class="footer-simbol">☽ ✧ ☾</p>

                                <h2 class="form-title">
                                    Os astros revelaram!
                                </h2>

                                <p class="form-text">
                                    O seu signo é:
                                </p>

                                <?php
                                    $nomeSigno = (string) $signoEncontrado->signoNome;
                                    $imagemSigno = $imagensSignos[$nomeSigno] ?? null;
                                ?>

                                <?php if ($imagemSigno): ?>
                                    <div class="signo-imagem">
                                        <img
                                            src="assets/imgs/<?= htmlspecialchars($imagemSigno) ?>"
                                            alt="Signo de <?= htmlspecialchars($nomeSigno) ?>">
                                    </div>
                                <?php endif; ?>

                                <h1 class="form-title">
                                    <?= htmlspecialchars((string) $signoEncontrado->signoNome, ENT_QUOTES, 'UTF-8') ?>
                                </h1>

                                <p class="form-text">
                                    <?= $dataNascimento->format('d/m/Y') ?>
                                </p>

                                <p>
                                    <?= nl2br(htmlspecialchars((string) $signoEncontrado->descricao)) ?>
                                </p>

                            <?php else: ?>

                                <h2 class="form-title">
                                    Os astros estão confusos...
                                </h2>

                                <p class="form-text">
                                    Não foi possível identificar seu signo.<br>Verifique as informações e tente novamente.
                                </p>

                            <?php endif; ?>

                            <a href="index.php" class="btn btn-primary mt-3">
                                Fazer nova consulta
                            </a>

                        </div>

                    </div>
                </div>

            </div>
        </main>

        <footer class="bg-dark-grimoire py-3 mt-auto">
            <div class="container text-center">
                <small class="footer-simbol">☽✧☾</small><br>
                <small>Feito sob a luz das estrelas.</small>
                <p class="copyright">
                    &copy; 2026 · Astral Grimoire
                </p>
            </div>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>