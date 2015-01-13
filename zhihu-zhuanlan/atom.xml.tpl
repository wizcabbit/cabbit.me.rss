<?xml version="1.0" encoding="utf-8" ?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <title type="text">{$channel.name}</title>
  <subtitle type="text">{$channel.description}</subtitle>
  <id>{$URL_BASE}{$channel.slug}</id>
  <updated></updated>
  <author>
    <name>{$channel.creator.name}</name>
    <uri>{$channel.creator.profileUrl}</uri>
  </author>
  <generator>cabbit.me</generator>
  <postCount>{$channel.postsCount}</postCount>
{foreach $posts as $post}
  <entry>
    <id>{$URL_BASE}{$post.url}</id>
    <title type="text">{$post.title}</title>
    <published>{$post.publishedTime}</published>
    <updated>{$post.publishedTime}</updated>
    <author>
      <name>{$post.author.name}</name>
      <uri>{$post.author.profileUrl}</uri>
    </author>
    <link rel="alternate" href="{$URL_BASE}{$post.url}" />
    <link rel="alternate" type="text/html" href="{$URL_BASE}{$post.url}" />
    <summary type="text"><![CDATA[{$post.summary}]]></summary>
    <content type="html"><![CDATA[{$post.content}]]></content>
  </entry>
{/foreach}
</feed>
