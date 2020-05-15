<?php

/**
 * YouTube Subscribe widget template
 */

$html = '<div id="av_yt_container" class="' . $attr['class'] . '" style="background-color: ' . $attr['bgcolor'] . '; border: 1px solid ' . $attr['bordercolor'] .'; padding: 5px 10px 0 10px; clear: both; text-align: ' . $attr['align'] . ';"><div id="av_yt_text" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; vertical-align: top; display: inline-block; height: 24px; margin-right: 5px; padding-top: 4px; font-family: Arial, Helvetica, Verdana, sans-serif, sans; font-size: 13px; color: ' . $attr['color'] . '">' . $attr['text'] . '</div><div id="av_yt_subcribe_btn" class="g-ytsubscribe" data-channelid="' . $attr['channel_id'] .'" data-layout="' . $attr['layout'] . '" data-theme="' . $attr['theme'] . '" data-count="' . $attr['subscribers'] . '"></div></div>';