<?php
/**
 * Read from the CSV and format it as a fully-specced OPML file.
 */

$handle = fopen( './feeds.csv', 'r' );

if ( false === $handle ) {
	echo 'error accessing csv file';
	exit();
}

/**
 * Escape strings for display
 * 
 * @link https://stackoverflow.com/questions/3426090/how-do-you-make-strings-xml-safe
 * @param string $string The string to escape
 * @return string
 */
function escape( $string ) {
	return htmlspecialchars( $string, ENT_XML1 );
}

/**
 * Convert our feeds.csv into a number of <outline> elements
 * 
 * @param resource $handle Pointer to ./feeds.csv
 * @return void
 */
function iterate( $handle ) {
	$iterator = 0;
	while ( ($data = fgetcsv( $handle, 1000 ) ) !== false ) {
		$iterator++;
		// skip over the header row.
		if ( 1 === $iterator ) {
			continue;
		}

		/*
		 * 0 Feed Number
		 * 1 Title
		 * 2 Link
		 * 3 Description
		 * 4 Feed URL
		 * 5 Feed Type
		 */
		printf(
			'<outline text="%1$s" type="%2$s" xmlUrl="%3$s" htmlUrl="%4$s"/>',
			escape($data[1]) ?? '', // title
			'rss', // feed type is hardcoded; these are all feeds
			$data[4] ?? '', // feed URL
			$data[2] ?? '' // link
		);
		echo "\n";
	}
}

$dateModified = date_format( date_create("now"), "d M Y" );

?>
<opml version="2.0">
	<head>
		<title>Columbus Miscellaneous RSS Feeds</title>
		<dateCreated>20 November 2023</dateCreated>
		<dateModified><?php echo $dateModified; ?></dateModified>
		<ownerName>Ben Keith</ownerName>
		<docs>http://opml.org/spec2.opml</docs>
		<docs>https://github.com/benlk/columbus-govdelivery-rss/</docs>
	</head>
	<body>
		<outline text="Columbus Miscellaneous RSS Feeds">
			<?php
				iterate( $handle );
			?>
		</outline>
	</body>
</opml>
