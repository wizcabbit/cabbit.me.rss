<?xml version="1.0" encoding="utf-8" ?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <title type="text">{$channel.name|htmlspecialchars}</title>
  <subtitle type="text">{$channel.description}</subtitle>
  <link href="{$URL_BASE}/{$channel.slug}/"/>
  <id>{$URL_BASE}/{$channel.slug}/</id>
  <updated>{$smarty.now|date_format:'Y-m-d\TH:i:sP'}</updated>
  <author>
    <name>{$channel.creator.name}</name>
    <uri>{$channel.creator.profileUrl}</uri>
  </author>
  <generator>cabbit.me</generator>
{foreach $posts as $post}
  <entry>
    <id>{$URL_BASE}{$post.url}</id>
    <title type="text">{$post.title|htmlspecialchars}</title>
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
