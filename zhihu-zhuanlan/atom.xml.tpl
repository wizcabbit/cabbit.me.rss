<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
  <channel>
    <title>{$user.name}</title>
    <slug>{$user.slug}</slug>
    <profileUrl>{$user.creator.profileUrl}</profileUrl>
    <description><![CDATA[{$user.description}]]></description>
    <postCount>{$user.postsCount}</postCount>
    {foreach $posts as $post}
    <item>
      <title>{$post.title}</title>
      <author>{$post.author.name}</author>
      <publishedTime>{$post.publishedTime}</publishedTime>
      <summary><![CDATA[{$post.summary}]]></summary>
      <description><![CDATA[{$post.content}]]></description>
    </item>
    {/foreach}
  </channel>
</rss>
