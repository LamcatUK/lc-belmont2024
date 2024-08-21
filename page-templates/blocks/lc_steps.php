<section class="steps py-5">
    <div class="container-xl w-md-50 bg-cream-300 p-4">
        <div class="text-center">
            <h3 class="has-line"><?=get_field('title')?></h3>
        </div>
        <?php
        $c = 1;
        while (have_rows('steps')) {
            the_row();
            ?>
        <div class="steps__card">
            <div class="steps__number"><?=$c?></div>
            <div class="steps__inner">
                <div class="steps__title"><?=get_sub_field('title')?></div>
                <div class="steps__descr"><?=get_sub_field('content')?></div>
            </div>
        </div>
            <?php
            $c++;
        }
        ?>
        <div class="mt-4 text-center fw-bold"><?=get_field('outro')?></div>
    </div>
</section>