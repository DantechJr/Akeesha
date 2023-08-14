<?php

class Age_Gate_Cron
{
    private function getDefault()
    {
        $locale = get_locale();

        return [
            'restrictions' => [
                'min_age' => ($locale == 'en_GB') ? 18 : 21,
                'restriction_type' => 'all',
                'multi_age' => 0,
                'restrict_register' => 1,
                'input_type' => 'inputs',
                'stepped' => 0,
                'button_order' => 'yes-no',
                'inherit_category' => 0,
                'remember' => 0,
                'remember_days' => 365,
                'remember_timescale' => 'days',
                'remember_auto_check' => 0,
                'date_format' => ($locale == 'en_GB') ? 'ddmmyyyy' : 'mmddyyyy',
                'ignore_logged' => 0,
                'rechallenge' => 1,
                'fail_link_title' => null,
                'fail_link' => null,
            ],
            'messages' => [
                'instruction' => '',
                'messaging' => '',
                'invalid_input_msg' => __('Your input was invalid', 'age-gate'),
                'under_age_msg' => __('You are not old enough to view this content', 'age-gate'),
                'generic_error_msg' => __('An error occurred, please try again', 'age-gate'),
                'remember_me_text' => __('Remember me', 'age-gate'),
                'yes_no_message' => __('Are you over %s years of age?', 'age-gate'),
                'yes_text' => __('Yes', 'age-gate'),
                'no_text' => __('No', 'age-gate'),
                'additional' => '',
                'button_text' => __('Submit', 'age-gate'),
                'cookie_message' => __('Your browser does not support cookies, you may experience problems entering this site', 'age-gate'),
                'text_day' => __('Day', 'age-gate'),
                'text_month' => __('Month', 'age-gate'),
                'text_year' => __('Year', 'age-gate'),
                'aria_label' => __('Verify you are over %s years of age?', 'age-gate')
            ],
            'validation_messages' => [
                'validate_required'                 => 'The {field} field is required',
                'validate_numeric'                  => 'The {field} field must be a number',
                'validate_max_len'                  => 'The {field} field needs to be {param} characters or less',
                'validate_min_len'                  => 'The {field} field needs to be at least {param} characters',
                'validate_min_numeric'              => 'The {field} field needs to be a numeric value, equal to, or higher than {param}',
                'validate_max_numeric'              => 'The {field} field needs to be a numeric value, equal to, or lower than {param}',
                'validate_min_age'                  => 'The {field} field needs to have an age greater than or equal to {param}',
                'validate_date'                     => 'The date provided is invalid'
            ],
            'appearance' => [
                'logo' => null,
                'background_colour' => null,
                'background_opacity' => 1,
                'background_image' => null,
                'background_image_opacity' => 1,
                'foreground_colour' => null,
                'foreground_opacity' => 1,
                'text_colour' => null,
                'styling' => 1,
                'device_width' => 1,
                'switch_title' => 0,
                'custom_title' => 'Age Verification',
                'auto_tab' => 0,
                'title_separator' => '-',
                'title_format' => 'page-name',
                'transition' => '',
                'background_pos_x' => 'center',
                'background_pos_y' => 'center'
            ],
            'advanced' => [
                'use_js' => 1,
                'save_to_file' => 0,
                'custom_css' => '',
                'restrict_archives' => 0,
                'dev_notify' => 1,
                'dev_hide_warning' => 0,
                'anonymous_age_gate' => 0,
                'endpoint' => 'ajax',
                'use_default_lang' => 1,
                'use_meta_box' => 0,
                'custom_bots' => [],
                'inherit_taxonomies' => ['categories'],
                'enable_quicktags' => 0,
                'full_nav' => 'toggle',
                'enable_import_export' => 0,
                'post_to_self' => 0,
                'filter_qs' => 0,
                'js_hooks' => 0,
                'cookie_name' => '',
                'rta_tag' => 0,
                'munge_options' => 0
            ]
        ];
    }

    public function __construct()
    {
        add_action('age_gate/cron_options', [$this, 'checkOptions']);
    }

    public function checkOptions()
    {
        $run = apply_filters('age_gate/cron/clean', true);

        if ($run) {
            require_once AGE_GATE_PATH . 'includes/class-age-gate-activator.php';
            Age_Gate_Activator::activate();
        }
        // $this->_set_admin_notice(array('message' => __('It looks like you\'ve recently updated Age Gate, please clear any caches.', 'age-gate'), 'status' => 'warning'));

        // foreach ($this->getDefault() as $key => $options) {
        //     $userSettings = get_option('wp_age_gate_' . $key, []);

        //     $issues = [];

        //     foreach ($userSettings as $name => $option) {
        //         if (is_array($option)) {
        //             // $issues[$name]
        //         } else {
        //             $issues[$name] = (strpos($option, '<script') !== false);
        //         }
        //     }
        //     // error_log(print_r(get_option('wp_age_gate_' . $key, []), 1));
        //     $issues = array_filter($issues);

        //     if ($issues) {
        //         $clean = $this->clean($issues, $options);
        //         error_log(print_r($issues, 1));
        //     }
        // }
        // error_log(print_r(get_option('wp_age_gate_' . $key, []), 1));
    }

    public function clean($issues, $options)
    {
        foreach ($options as $issue) {
        }
    }
}
