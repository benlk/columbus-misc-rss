# Columbus City Government Miscellaneous RSS Feeds

**→ [Download the CSV](./feeds.csv) ←**

**→ [Import the OPML](https://github.com/benlk/columbus-misc-rss/raw/trunk/subscriptions.opml) ←**

**What**: This repository contains a list of random RSS feeds that I've found which are relevant to the City of Columbus, Ohio. This list excludes the [>290 RSS feeds for Columbus' GovDelivery newsletters](https://github.com/benlk/columbus-govdelivery-rss/). Those feeds are scraped; these are hand-curated.

**Why**: If you want to stay on top of things.

**When**: See [the changelog](./changelog.md) for major updates to this repository; if you just want to keep an eye on updates [watch the git log](https://github.com/benlk/columbus-misc-rss/commits/trunk)

**How**: The list is contained in `feeds.csv`, which is a [Comma-Separated Value](https://en.wikipedia.org/wiki/Comma-separated_values) file that you can open in a spreadsheet program such as Excel, Numbers, LibreOffice Calc, or Google Sheets. The data contains the following columns:

- Feed Number: Legacy field for data format compatibility with [`benlk/columbus-govdelivery-rss`](https://github.com/benlk/columbus-govdelivery-rss/tree/trunk).
- Title: This is a hand-written title for the feed.
- Link: This is extracted from each RSS feed. It is the related website URL for the feed, although I note that most URLs are for the maximally-generic domain instead of the more-specific corner of the website.
- Description: This is a hand-written description of the content of the feed, with my commentary.
- Feed URL: This is the feed URL.
- Feed Type: RSS or Atom?

If you find interesting feeds in this list, tell the world, but also tell me on Bluesky [@benlk.com](https://bsky.app/profile/benlk.com) or Mastodon [@benlk@urbanists.social](https://urbanists.social/@benlk)

## Common Issues

- Some RSS feeds here may be published by their servers with an incorrect [`Content-Type` header](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Type) of `text/html`. If this causes problems for your feedreader, consult your feedreader's documentation. FreshRSS supports adding a `#force_feed` to the end of the feed URL to force the software to interpret the file as `application/rss+xml`
- Some RSS feeds here have zero items, or update very infrequently.

## Updating instructions

1. Update the CSV
2. `php subscriptions.opml.php > subscriptions.opml`
3. Update `changelog.md` if necessary
4. Commit changes and push
