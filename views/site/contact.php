<?php include ROOT . '/views/layouts/header2.php'; ?>

<section>
    <div class="container">
                    <div class="signup-form">
                        <h1>Feedback</h1>
                        <h4>Mate otazky? </h4>
                        <form action="#" method="post">
                              <h2>Email</h2>
                            <input type="email" name="userEmail" placeholder="E-mail" value=""/>
                            <h2>Zprava</h2>
                            <input type="text" name="userText" placeholder="Zprava" value=""/>
                            <input type="submit" name="submit"  value="Odeslat" />
                        </form>
                    </div>
    </div>
</section>
</br>
<?php include ROOT . '/views/layouts/footer.php'; ?>