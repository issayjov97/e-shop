<?php include ROOT . '/views/layouts/header2.php'; ?>

<section>
    <div class="container">
                
               <?php if ($result): ?>
                    <p>You have been registered!</p>
                    <?php header("refresh:5;/cabinet/") ?>
                <?php else: ?>
                    <?php if (isset($errors)): ?>
                       <p>
                           <?php echo $errors ?>
                       </p>
                    <?php endif; ?> 

                    <div class="signup-form">
                        <h2>Registrace</h2>
                        <form  action="#" method="post">
                            <input type="text" name="jmeno" placeholder="jmeno" value="<?=$jmeno ?>"/>
                            <input type="text" name="prijmeni" placeholder="prijmeni" value="<?=$prijmeni ?>"/>
                            <input type="email" name="email" placeholder="E-mal" value="<?=$email ?>"/>
                            <input type="password" name="heslo" placeholder="heslo" value="<?=$heslo ?>"/>
                             <input type="tel" name="cislo" placeholder="cislo" value="<?=$cislo ?>"/>
                            <input type="submit" name="submit" value="Registrace" />
                        </form>
                    </div>
                
                <?php endif; ?> 
                <br/>
                <br/>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>