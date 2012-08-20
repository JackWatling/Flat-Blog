#Flat-Blog

##Description

Flat-Blog is a simple, effective and configurable flat-file blog system.

##Installation

1. Ensure that your web hosting supports PHP 5.0.3
2. Download the latest revision from the downloads tab.
3. Upload all of the files to your website, ensuring to keep the directory structure.
4. You're finished!

If you've followed the above steps correctly Flat-Blog should now be running. At present it will be displaying three test posts, these can be removed by deleting all files currently within the posts directory.

##Configuration

Configuration is available within Flat-Blog and should be added as an array within the `configuration.class.php` file, within the `classes` directory. Adding an item to this array will override the appropriate value in the other class specific configurations, if a value of the same name exists.

For example if I included `'blog_title' => 'My Blog'` in the configuration `config` array then this would override the default value within the `flat.class.php` configuration.