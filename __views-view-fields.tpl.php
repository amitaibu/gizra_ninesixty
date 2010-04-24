<?php
// $Id: views-view-fields.tpl.php,v 1.6 2008/09/24 22:48:21 merlinofchaos Exp $
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<?php
/**
 * Set the grid of each field. We don't key the array field name (e.g. nid, title, etc')
 * in order to allow changing the fields or their order in the Views without
 * harming the theme override.
 * The following example assumes we have a total grid of 8, and we want to place
 * the fields next to each other:
 * @code
 *  $row_wrapper = 'grid-8';
 *
 *  $ids = array(
 *    '0' => 'grid-4 alpha',
 *    '1' => 'grid-2',
 *    '2' => 'grid-2 omega',
 *  );
 * @endcode
 *
 * Above code will result in this structure:
 *
 * +--------------------------8--------------------------+
 * +-------------------------+ +-----------+ +-----------+
 * |                         | |           | |           |
 * |           4             | |     2     | |     2     |
 * |                         | |           | |           |
 * +-------------------------+ +-----------+ +-----------+
 *
 * In order to group fields together under the same grid definition is done by
 * specifying and empty value.
 *
 * @code
 *  $row_wrapper = 'grid-8';
 *
 *  $ids = array(
 *    '0' => 'grid-6 alpha',
 *    '1' => 'grid-2 omega',
 *    '2' => '',
 *  );
 * @endcode
 *
 * Above code will result in this structure:
 *
 * +--------------------------8--------------------------+
 * +---------------------------------------+ +-----------+
 * |                                       | |           |
 * |                                       | |     2     |
 * |                                       | |           |
 * |                   6                   | +-----------+
 * |                                       | +-----------+
 * |                                       | |           |
 * |                                       | |     2     |
 * |                                       | |           |
 * +---------------------------------------+ +-----------+
 */

  $row_wrapper = 'grid-9';

  $ids = array(
    '0' => 'grid-3 alpha',
    '1' => 'grid-3',
    '2' => 'grid-3 omega',
  );
?>

<?php
  // Get the ID keys.
  $ids_keys = array_flip(array_keys($fields));
?>
<div class="wrapper-views-row <?php print $row_wrapper;?>">
  <?php foreach ($fields as $id => $field): ?>
    <?php if (!empty($field->separator)): ?>
      <?php print $field->separator; ?>
    <?php endif; ?>

    <?php if (!empty($ids[$ids_keys[$id]])): ?>
      <div class="<?php print $ids[$ids_keys[$id]]; ?>">
    <?php endif; ?>

    <<?php print $field->inline_html;?> class="views-field-<?php print $field->class;?>">
      <?php if ($field->label): ?>
        <label class="views-label-<?php print $field->class; ?>">
          <?php print $field->label; ?>:
        </label>
      <?php endif; ?>
        <?php
        // $field->element_type is either SPAN or DIV depending upon whether or not
        // the field is a 'block' element type or 'inline' element type.
        ?>
        <<?php print $field->element_type; ?> class="field-content"><?php print $field->content; ?></<?php print $field->element_type; ?>>
    </<?php print $field->inline_html;?>>

    <?php if (!isset($ids[$ids_keys[$id] + 1])): ?>
      </div>
    <?php elseif (!empty($ids[$ids_keys[$id] + 1])): ?>
      </div>
    <?php endif; ?>

  <?php endforeach; ?>
</div>