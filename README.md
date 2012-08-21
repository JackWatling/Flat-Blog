#Flat-Blog

##Description
The simple, effective, and configurable flat-file blog system.

##Installation
1. Ensure that your web hosting supports PHP 5.0.3
2. Download the latest revision of Flat-Blog from the downloads tab.
3. Upload all of the files to your website, ensuring to keep the directory structure.
4. You're finished!

The site should now be running the Flat-Blog system. At present it will be displaying three test posts, which are stored by default within the `posts` directory, each test post shows a range of features available within Flat-Blog.

##Configuration


##Posting
###Post Format
Flat-Blog uses JSON objects within a `.txt` file to store a post, not only does this mean that the post is readable as a text file, but promotes writing practice, as all files with have an almost identical layout.

	{
		"title": "Class Aptent Taciti",
		"date": "10-08-2012",
		"time": "21:30",
		"author": "Guest",
		"header_image": "hong_kong.jpg",
		"content": "Class aptent taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos. Pellentesque sagittis ante nec lectus mollis tincidunt et ac arcu. Etiam dictum luctus elementum. Ut purus dui, sagittis sed mattis sit amet, adipiscing et sem. Curabitur eget justo volutpat nulla consectetur dictum tincidunt non sapien. Morbi congue, mi in iaculis bibendum, metus diam ullamcorper velit, et adipiscing orci turpis at ipsum. Mauris eu massa diam, sed dapibus nisl. Aenean suscipit, elit nec convallis sodales, eros orci gravida massa, consequat lacinia orci libero sed nulla. Sed lobortis, ligula at tincidunt suscipit, velit est porta dui, vel pretium enim nibh sit amet magna. Duis elementum, purus ac ultricies suscipit, mauris lectus suscipit urna, viverra feugiat diam odio eu turpis. Aenean faucibus venenatis interdum.\\nNunc risus turpis, feugiat eget iaculis eget, feugiat nec sapien. Praesent ultrices lobortis mauris, eget lobortis nunc hendrerit id. Morbi convallis metus vitae mi tristique suscipit. Donec dolor massa, sagittis nec placerat vel, vulputate molestie leo. Mauris posuere bibendum leo ac venenatis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.equat nulla."
	}