<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="breadcumb-wrap">
                    <?php if (!empty($mainTitle)) : ?>
                        <h2><?php echo $mainTitle;?></h2>
                    <?php endif; ?>
                    <ol>
                        <?php if (!empty($Title)) : ?>
                            <li><a href="index.php"><i class="icon-36"></i> <?php echo $Title;?></a></li>
                        <?php endif; ?>
                        <?php if (!empty($Title2)) : ?>
                        <li><?php echo $Title2;?></li>
                        <?php endif; ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
