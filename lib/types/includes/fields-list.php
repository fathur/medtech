<?php
/*
 * Fields and groups list functions
 *
 * $HeadURL: http://plugins.svn.wordpress.org/types/tags/1.6.5/includes/fields-list.php $
 * $LastChangedDate: 2015-02-04 13:43:06 +0000 (Wed, 04 Feb 2015) $
 * $LastChangedRevision: 1082328 $
 * $LastChangedBy: iworks $
 *
 */

/**
 * Renders 'widefat' table.
 */
function wpcf_admin_fields_list() {
    $groups = wpcf_admin_fields_get_groups();

    if (empty($groups)) {
        echo '<p>'
        . __("To use custom fields, please create a group to hold them.",
                'wpcf')
        . '</p>';
        echo '<br /><a class="button-primary" href="'
        . admin_url('admin.php?page=wpcf-edit')
        . '">' . __('Add a custom fields group', 'wpcf') . '</a><br /><br />';
    } else {
        echo '<br /><a class="button-secondary" href="'
        . admin_url('admin.php?page=wpcf-edit')
        . '">' . __('Add a custom fields group', 'wpcf') . '</a><br /><br />';

        $rows = array();
        $header = array(
            'group_name' => __('Group name', 'wpcf'),
            'group_description' => __('Description', 'wpcf'),
            'group_active' => __('Active', 'wpcf'),
            'group_post_types' => __('Post types', 'wpcf'),
            'group_taxonomies' => __('Taxonomies', 'wpcf'),
        );
        foreach ($groups as $group) {

            // Set 'name' column
            $name = '';
            $name .= '<a href="'
                . admin_url('admin.php?page=wpcf-edit&amp;group_id='
                . $group['id']) . '">' . $group['name'] . '</a>';
            $name .= '<br />';
            $name .= '<a href="'
                . admin_url('admin.php?page=wpcf-edit&amp;group_id='
                . $group['id']) . '">' . __('Edit', 'wpcf') . '</a> | ';

            $name .= $group['is_active'] ? wpcf_admin_fields_get_ajax_deactivation_link($group['id']) . ' | ' : wpcf_admin_fields_get_ajax_activation_link($group['id']) . ' | ';

            $name .= '<a href="'
                . admin_url('admin-ajax.php?action=wpcf_ajax&amp;'
                . 'wpcf_action=delete_group&amp;group_id='
                . $group['id'] . '&amp;wpcf_ajax_update=wpcf_list_ajax_response_'
                . $group['id']) . '&amp;_wpnonce=' . wp_create_nonce('delete_group')
                . '&amp;wpcf_warning='
                . __('Are you sure?', 'wpcf') . '" class="wpcf-ajax-link" '
                . 'id="wpcf-list-delete-' . $group['id'] . '">'
                . __('Delete Permanently', 'wpcf') . '</a>';

            $name .= '<div id="wpcf_list_ajax_response_' . $group['id'] . '"></div>';

            $rows[$group['id']]['name'] = $name;
            $rows[$group['id']]['raw_name'] = $group['name'];


            $rows[$group['id']]['description'] = $group['description'];
            $rows[$group['id']]['active-' . $group['id']] = $group['is_active'] ? __('Yes', 'wpcf') : __('No', 'wpcf');
            $rows[$group['id']]['status'] = $group['is_active']? 'active':'inactive';

            // Set 'post_tpes' column
            $post_types = wpcf_admin_get_post_types_by_group($group['id']);
            $rows[$group['id']]['post_types'] = empty($post_types) ? __('All post types', 'wpcf') : implode(', ', $post_types);

            // Set 'taxonomies' column
            $taxonomies = wpcf_admin_get_taxonomies_by_group($group['id']);
            $output = '';
            if (empty($taxonomies)) {
                $output = __('None', 'wpcf');
            } else {
                foreach ($taxonomies as $taxonomy => $terms) {
                    $output .= '<em>' . $taxonomy . '</em>: ';
                    $terms_output = array();
                    foreach ($terms as $term_id => $term) {
                        $terms_output[] = $term['name'];
                    }
                    $output .= implode(', ', $terms_output) . '<br />';
                }
            }
            $rows[$group['id']]['tax'] = $output;
        }
        uasort($rows, 'wpcf_admin_fields_list_sort');

        // Render table
        wpcf_admin_widefat_table('wpcf_groups_list', $header, $rows);
    }

    do_action('wpcf_groups_list_table_after');
}

function wpcf_admin_fields_list_sort($a,$b)
{
    $a = strtolower($a['raw_name']);
    $b = strtolower($b['raw_name']);
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;

}
