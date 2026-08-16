<?php
// PORT THIS — becomes AMFC's translation source (or is redefined behind t() in helpers.php).
// Keys are structural (never raw copy) so this file survives copy edits without breaking markup.
// zh-Hant-TW only for Phase 1 — see CLAUDE.md "Content & i18n" for why.

return [
    'site.name' => 'AMFC 亞太普惠金融科技',
    'site.description' => 'AMFC 亞太普惠金融科技致力於連結在地需求，提供汽機車貸款、個人貸款等普惠金融服務，以創新、專業、效率、誠信打造更溫暖的金融服務體驗。',
    'site.logo_alt' => 'FUNDS AMFC',

    'nav.about' => '關於我們',
    'nav.services' => '服務項目',
    'nav.news' => '最新消息',
    'nav.investor' => '發行資訊',
    'nav.language' => 'Language',
    'nav.lang.en' => 'English',
    'nav.lang.ja' => '日本語',
    'nav.lang.id' => 'Indonesian',

    // --- Hero ---
    'home.hero.eyebrow' => 'Financial inclusiveness for a better Asia',
    'home.hero.headline_1' => '連結在地需求',
    'home.hero.headline_2' => '讓日常金融',
    'home.hero.headline_3' => '更溫暖更有力',
    'home.hero.cta' => '立即了解',
    'home.hero.photo_alt' => '一對情侶開心地使用手機',

    // --- Company philosophy ---
    // CORRECTED against the connected Figma file (get_design_context, node 87:44) — the
    // section is actually 4 overlapping/rotated stat cards, not a single stat as first built
    // from the screenshot alone.
    'home.philosophy.eyebrow' => '公司理念',
    'home.philosophy.headline_line1' => '我們以創新、專業、',
    'home.philosophy.headline_line2' => '效率、誠信四項理念',
    // Split into prefix/highlight/suffix so the hand-drawn underline (per feedback) can scope
    // to just "創新、專業、" and "效率、誠信" rather than the full line — the two keys above
    // stay too, in case a future non-highlighted rendering of this headline is ever needed.
    'home.philosophy.headline_line1_prefix' => '我們以',
    'home.philosophy.headline_line1_highlight' => '創新、專業、',
    'home.philosophy.headline_line2_highlight' => '效率、誠信',
    'home.philosophy.headline_line2_suffix' => '四項理念',
    'home.philosophy.stat1.tag' => '誠信',
    'home.philosophy.stat1.number' => 'NT$200億+',
    'home.philosophy.stat1.label' => '資產管理總量',
    'home.philosophy.stat1.icon_alt' => '誠信：資產管理總量圖示',
    'home.philosophy.stat2.tag' => '創新',
    'home.philosophy.stat2.number' => 'AI',
    'home.philosophy.stat2.label' => '智能數據風控',
    'home.philosophy.stat2.icon_alt' => '創新：AI 智能數據風控圖示',
    'home.philosophy.stat3.tag' => '效率',
    'home.philosophy.stat3.number' => '20萬+',
    'home.philosophy.stat3.label' => '用戶誠摯推薦',
    'home.philosophy.stat3.icon_alt' => '效率：用戶誠摯推薦圖示',
    // Was '創新' as-authored in Figma, which duplicated stat2's tag and left 專業 unused. Changed
    // per feedback, so the four cards' tags now cover the four principles named in this section's
    // own headline (創新、專業、效率、誠信) one each, rather than repeating one and dropping another.
    'home.philosophy.stat4.tag' => '專業',
    'home.philosophy.stat4.number' => '20年+',
    'home.philosophy.stat4.label' => '金融實務經驗',
    'home.philosophy.stat4.icon_alt' => '20年以上金融實務經驗標誌',

    // --- Funds partnership ---
    'home.funds.logo_alt' => 'Funds Inc 標誌',
    'home.funds.body' => '本公司正式納入日本 Funds Inc 集團體系。Funds Inc 為日本金融科技領域具代表性的企業，長期深耕當地市場，於嚴謹監管架構下累積深厚合規營運與風險管理實務，展現穩健的集團治理能力與跨域整合實力。',

    // --- Services ---
    'home.services.eyebrow' => '服務項目',
    'home.services.headline' => '亞太普惠貸款方案，解決你當下的資金需求',
    'home.services.vehicle.icon_alt' => '汽機車貸款圖示',
    'home.services.vehicle.title' => '汽機車貸款',
    'home.services.vehicle.body' => '名下汽機車就是行動資產，免留車、免繁瑣流程，有車就能貸！',
    'home.services.vehicle.cta' => '了解更多',
    'home.services.personal.icon_alt' => '個人貸款圖示',
    'home.services.personal.title' => '個人貸款',
    'home.services.personal.body' => '生活臨時資金需求，不用請假跑銀行！專人服務，線上申請，快速審核，進度即時推播一手掌握',
    'home.services.personal.cta' => '了解更多',

    // --- Trust / compliance ---
    // CORRECTED entity name: 瑞源證券投資顧問股份有限公司 (Swiss Wealth Securities Investment
    // Consulting Co., LTD) — an earlier pass had this wrong from misreading a small screenshot;
    // confirmed both from the Figma source text AND the real badge logo image itself.
    'home.trust.headline_line1' => '以專業與合規，',
    'home.trust.headline_line2' => '打造值得信賴的金融服務',
    'home.trust.body' => '本公司已加入臺灣金融科技協會（TFTA），取得 ISO 國際認證（ISO 27001 及 ISO 27701），並與瑞源證券投資顧問股份有限公司攜手合作，持續以專業標準、資訊安全與合規管理，提供值得信賴的金融服務。',
    'home.trust.badge.tfta_alt' => 'TFTA 台灣金融科技協會',
    'home.trust.badge.ias_iaf_alt' => 'IAS / IAF 國際認證標誌',
    'home.trust.badge.entity_alt' => '瑞源證券投資顧問股份有限公司 Swiss Wealth Securities Investment Consulting Co., LTD',

    // --- App download ---
    'home.app.photo_alt' => '手拿咖啡與手機的生活情境照',
    'home.app.headline' => '手頭吃緊？神隊友KingDo桑來救援！',
    'home.app.body' => '隨時申請，快速核准，即刻撥款',
    'home.app.cta' => '下載App',
    'home.app.google_play_alt' => 'Google Play 下載',
    'home.app.app_store_alt' => 'App Store 下載',

    // --- Investor relations ---
    'home.investor.photo_alt' => '手持平板檢視投資圖表',
    'home.investor.headline' => '發行資訊',
    'home.investor.body' => '提供亞太普惠私募公司債之相關資訊整理與導引。僅供資訊查詢，並非對外進行廣告、要約或勸誘投資或認購，亦不受理任何公開認購或投資申請。',
    'home.investor.cta' => '了解更多',

    // --- 3-card grid ---
    // These are single flattened illustration images with text baked in (confirmed via Figma
    // source — no separate title/icon layers), so alt text carries the full meaning, no
    // separate heading markup needed.
    'home.grid.media.alt' => '媒體報導：插畫，一人拿著印有 NEWS 的報紙',
    'home.grid.event.alt' => '活動花絮：插畫，一人揮手歡呼',
    'home.grid.antifraud.alt' => '防詐騙公告：插畫，一人講電話並面露疑惑',

    // --- Footer ---
    'footer.col.about.title' => '關於我們',
    'footer.col.about.item1' => '關於亞太普惠',
    'footer.col.about.item2' => '大事紀',
    'footer.col.about.item3' => '企業永續', // was missing entirely — confirmed via Figma (node 87:84)
    'footer.col.about.item4' => '人才招募',
    'footer.col.services.title' => '服務介紹',
    'footer.col.services.item1' => '汽機車貸款',
    'footer.col.services.item2' => '個人貸款',
    'footer.col.services.item3' => '逗陣貸', // was missing entirely — confirmed via Figma (node 87:87)
    'footer.col.investor.title' => '投資人資訊',
    'footer.col.investor.item1' => '發行資訊',
    'footer.col.news.title' => '最新訊息', // as-authored in Figma footer (nav uses "最新消息" — the source design itself uses two different strings)
    'footer.col.news.item1' => '活動花絮',
    'footer.col.news.item2' => '媒體報導',
    'footer.col.antifraud.title' => '防詐騙專區',
    'footer.col.antifraud.item1' => '防詐騙公告', // was reusing the title string — confirmed via Figma (node 87:95) this is separate copy
    'footer.col.app.title' => '亞太普惠APP',
    'footer.col.app.item1' => '亞太普惠智能貸款',
    'footer.col.app.item2' => '逗陣貸',
    'footer.col.app.item3' => '亞太普惠帳單',
    'footer.col.contact.title' => '聯絡我們',
    // Contact details below are now sourced from the connected Figma file's text nodes
    // (get_design_context, node 87:44) rather than transcribed off a screenshot — still worth
    // a final check against AMFC's own source before shipping, since it's factual business info,
    // but this replaces the earlier screenshot-transcription which had the Taiwan unit number wrong.
    'footer.contact.customer_service.title_zh' => '客戶服務',
    'footer.contact.customer_service.title_en1' => 'Customer',
    'footer.contact.customer_service.title_en2' => 'Service',
    'footer.contact.customer_service.phone' => '(886) 2 6604 0880',
    'footer.contact.customer_service.hours_zh' => '平日 09:00-18:00 / ',
    'footer.contact.customer_service.hours_en' => 'Business Hour 9:00-18:00',
    'footer.contact.taiwan.title_zh' => '臺灣據點',
    'footer.contact.taiwan.title_en' => 'Taiwan Office',
    'footer.contact.taiwan.address_zh' => '104439 台北市中山區德惠街9-1號B2',
    'footer.contact.taiwan.address_en' => 'B2., No. 9-1, Dehui St., Zhongshan Dist., Taipei City, 104439, Taiwan (R.O.C)',
    'footer.contact.japan.title_zh' => '日本據點',
    'footer.contact.japan.title_en' => 'Japan Office',
    'footer.contact.japan.address_zh' => '〒530-0017大阪府大阪市北区角田町8-47 阪急グランドビル26階',
    'footer.contact.japan.address_en' => 'Hankyu Grand Building, 26F 8−47 Kakuda-cho, Kita Ward Osaka 530-0017 Japan',
    'footer.logo_alt' => 'FUNDS AMFC',
];
