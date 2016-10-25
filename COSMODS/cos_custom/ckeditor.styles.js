/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/*
 * This file is used/requested by the 'Styles' button.
 * The 'Styles' button is not enabled by default in DrupalFull and DrupalFiltered toolbars.
 */
if(typeof(CKEDITOR) !== 'undefined') {
    CKEDITOR.addStylesSet( 'drupal',
    [
        {
            name : 'Image on Left',
            element : 'img',
            attributes :
            {
                'class' : 'img_left'
            }
        },

        {
            name : 'Image on Right',
            element : 'img',
            attributes :
            {
                'class' : 'img_right'
            }
        },

        /* 
         * Button Styles
         */
        {
            name : 'Normal Link (Ideal)',
            element : 'a',
            attributes :
            {
                'class' : ''
            }
        },

        {
            name : 'Department Button',
            element : 'a',
            attributes :
            {
                'class' : 'department_button',
            }
        },

        {
            name : 'Gray Button',
            element : 'a',
            attributes :
            {
                'class' : 'gray_button'
            }
        },

        {
            name : 'Blue Button',
            element : 'a',
            attributes :
            {
                'class' : 'blue_button'
            }
        },

        {
            name : 'Orange Button',
            element : 'a',
            attributes :
            {
                'class' : 'orange_button'
            }
        },

        /* 
         * Table Styles
         */
        {
            name : 'Default Table',
            element : 'table',
            attributes :
            {
                'class' : 'default_table'
            }
        },

        {
            name : 'Large Table',
            element : 'table',
            attributes :
            {
                'class' : 'large_table'
            }
        },

        /* Table Cell Styles */
        
        {
            name : 'Align Top',
            element : 'td',
            attributes : { 'class' : 'td_align_top' }
        },

        {
            name : 'Align Center',
            element : 'td',
            attributes : { 'class' : 'td_align_center' }
        },

        {
            name : 'Half Width',
            element : 'td',
            attributes : { 'class' : 'td_half_width' }
        },

        {
            name : 'Third Width',
            element : 'td',
            attributes : { 'class' : 'td_third_width' }
        },

        /* 
         * Quote Styles
         */
        {
            name : 'Box Quote',
            element : 'div',
            attributes :
            {
                'class' : 'box_quote'
            }
        }
    ]);
}
