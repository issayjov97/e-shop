<?php include ROOT . '/views/layouts/header2.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if (isset($errors)): ?>
                       <p>
                           <?php echo $errors ?>
                       </p>
                    <?php endif; ?> 

                <div class="signup-form"><!--sign up form-->
                    <h2>Prihlaseni</h2>
                    <form action="#" method="post" class="login-form">
                        <input type="email" name="email" placeholder="E-mail" value="<?= $email?>"/>
                        <input type="password" name="heslo" placeholder="heslo" value=""/>
                        <input type="submit" name="submit" class="button" value="Prihlasit se" />
                    </form>
                    <a class="button " href="/user/register">Registrace</a>
                </div><!--/sign up form-->


                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>