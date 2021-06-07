<?php
# 리포지터리 객체 생성
$App__memberRepository = new APP__MemberRepository();
$App__boardRepository = new APP__BoardRepository();
$App__articleRepository = new APP__ArticleRepository();
$App__replyRepository = new APP__ReplyRepository();

# 서비스 객체 생성
$App__memberService = new APP__MemberService();
$App__boardService = new APP__BoardService();
$App__articleService = new APP__ArticleService();
$App__replyService = new APP__ReplyService();
