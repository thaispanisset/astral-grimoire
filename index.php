<?php include('layouts/header.php'); ?>

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
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="form-title">Descubra seu Signo</h2>
                        <p class="form-text">Já se pegou pensando se aquela indecisão foi muito geminiana? Ou se aquele toque de limpeza é virginiano demais? Ou se aquele choro pelo comercial é coisa de canceriano? Use o formulário ao lado e descubra qual é o seu signo!</p>
                    </div>
                    <div class="col-md-6">
                        <div class="form-box">
                            <form id="zodiacForm" action="show_zodiac_sign.php" method="POST">
                                <div class="mb-3">
                                    <label for="data_nascimento" class="form-label">Insira sua data de nascimento</label>
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Revelar meu signo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="bg-dark-grimoire py-3 mt-auto">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <small class="footer-simbol">☽✧☾</small><br>
                        <small>Feito sob a luz das estrelas.</small>
                        <p class="copyright">&copy; 2026 · Astral Grimoire</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>