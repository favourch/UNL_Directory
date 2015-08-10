<?php if (isset($context->bio)) { ?>
  <div class="directory-knowledge-section directory-knowledge-section-bio">
      <?php echo $context->bio; ?>
  </div>
<?php } ?>

<?php if ($context->education) { ?>
    <div class="directory-knowledge-section directory-knowledge-section-education">
        <h3 class="wdn-brand wdn-icon-ok">Education</h3>
        <ul class="directory-knowledge-section-inner">
            <?php foreach ($context->education as $degree) { ?>
                <li class="directory-knowledge-item">
                    <?php echo $degree['EDUCATION']['DEG']; ?> <?php echo $degree['EDUCATION']['YR_COMP']; ?> <?php echo $degree['EDUCATION']['SCHOOL']; ?>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<?php if ($context->courses) { ?>
    <div class="directory-knowledge-section directory-knowledge-section-courses">
        <h3 class="wdn-brand wdn-icon-user">Courses</h3>
        <ul class="directory-knowledge-section-inner">
            <?php foreach ($context->courses as $course) { ?>
                <li class="directory-knowledge-item">
                    <?php echo $course['SCHTEACH']['COURSEPRE']; ?> <?php echo $course['SCHTEACH']['COURSENUM']; ?> (<?php echo $course['SCHTEACH']['TYT_TERM']; ?> <?php echo $course['SCHTEACH']['TYY_TERM']; ?>): <?php echo $course['SCHTEACH']['TITLE']; ?>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<?php if ($context->papers) { ?>
    <div class="directory-knowledge-section directory-knowledge-section-papers">
        <h3 class="wdn-brand wdn-icon-print">Papers</h3>
        <ul class="directory-knowledge-section-inner">
            <?php foreach ($context->papers as $paper) { ?>
                <li class="directory-knowledge-item">
                    <?php echo $paper['INTELLCONT']['TITLE']; ?>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<?php if ($context->grants) { ?>
    <div class="directory-knowledge-section directory-knowledge-section-grants">
        <h3 class="wdn-brand wdn-icon-rocket">Research &amp; Grants</h3>
        <ul class="directory-knowledge-section-inner">
            <?php foreach ($context->grants as $grant) { ;?>
                <?php if ($grant['CONGRANT']['STATUS'] != 'Declined') { ?>
                    <li class="directory-knowledge-item">
                        <?php echo $grant['CONGRANT']['TITLE']; ?>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<?php if ($context->honors) { ?>
    <div class="directory-knowledge-section directory-knowledge-section-honors">
        <h3 class="wdn-brand wdn-icon-star-circled">Awards &amp; Honors</h3>
        <ul class="directory-knowledge-section-inner">
            <?php foreach ($context->honors as $honor) { ?>
                <li class="directory-knowledge-item">
                    <?php echo $honor['AWARDHONOR']['NAME']; ?> &ndash; <em><?php echo $honor['AWARDHONOR']['ORG']; ?></em>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<style>
    .directory-knowledge-section {
        border-bottom: 1px solid #ccc;
        padding-bottom: 2em;
    }
    .directory-knowledge-section:last-of-type {border-bottom: none}

    .directory-knowledge-section-inner {
        padding-left: 3em;
    }

</style>
