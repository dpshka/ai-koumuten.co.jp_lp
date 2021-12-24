<section class="form_cnt_sec">
    <h2 class="display_flex_center h2_form_cnt_sec">
        <span class="fw_600 fs_14_14 h2_form_cnt_sec_main">展示場</span>
        <span class="bg_8C1D26 cl_fff fw_400 fs_10_10 form_cnt_sec_span hissu_form_cnt_sec_span">必須</span>
    </h2>
    <div class="input_form_cnt_sec">
        [mwform_select name="分譲地名" id="cheack_box_cnt" class="he_32 cheack_box"]
    </div>
</section>

<section class="form_cnt_sec">
    <h2 class="display_flex_center h2_form_cnt_sec">
        <span class="fw_600 fs_14_14 h2_form_cnt_sec_main">お名前</span>
        <span class="bg_8C1D26 cl_fff fw_400 fs_10_10 form_cnt_sec_span hissu_form_cnt_sec_span">必須</span>
    </h2>
    <div class="input_form_cnt_sec">
        [mwform_text name="お名前" class="he_32 input_text100" size="60" placeholder="お名前を入力してください。"]
    </div>
</section>

<section class="form_cnt_sec">
    <h2 class="display_flex_center h2_form_cnt_sec">
        <span class="fw_600 fs_14_14 h2_form_cnt_sec_main">お問い合わせ内容</span>
        <span class="bg_8C1D26 cl_fff fw_400 fs_10_10 form_cnt_sec_span hissu_form_cnt_sec_span">必須</span>
    </h2>
    <div class="input_form_cnt_sec">
        <div class="checkbox_form_cnt_sec">
            [mwform_checkbox name="お問い合わせ内容" class="checkbox_w_100" children="来場予約,資料請求" separator=","]
        </div>
    </div>
</section>

<section class="form_cnt_sec">
    <h2 class="display_flex_center h2_form_cnt_sec">
        <span class="fw_600 fs_14_14 h2_form_cnt_sec_main">メールアドレス</span>
        <span class="bg_8C1D26 cl_fff fw_400 fs_10_10 form_cnt_sec_span hissu_form_cnt_sec_span">必須</span>
    </h2>
    <div class="input_form_cnt_sec">
        [mwform_email name="メールアドレス" class="he_32 input_text100" size="60" placeholder=""]
        <p class="ma_10 fw_500 fs_12_12 txt_input_form_cnt_sec">確認のため同じアドレスをご入力ください。</p>
        [mwform_email name="メールアドレス確認" class="he_32 input_text100" size="60" placeholder=""]
    </div>
</section>

<section class="form_cnt_sec">
    <h2 class="display_flex_center h2_form_cnt_sec">
        <span class="fw_600 fs_14_14 h2_form_cnt_sec_main">電話番号（携帯可）</span>
        <span class="bg_8CC63F cl_fff fw_400 fs_10_10 form_cnt_sec_span hissu_form_cnt_sec_span">任意</span>
    </h2>
    <div class="input_form_cnt_sec">
        <div class="checkbox_form_cnt_sec">
            [mwform_text name="電話番号" class="he_32 input_text100" size="60" placeholder=""]
        </div>
    </div>
</section>

<section class="form_cnt_sec">
    <h2 class="display_flex_center h2_form_cnt_sec">
        <span class="fw_600 fs_14_14 h2_form_cnt_sec_main">ご住所</span>
        <span class="cl_C1272D fw_500 fs_11_11 little_form_cnt_sec_main">※資料郵送をご希望される場合はご記入下さい。</span>
        <span class="bg_8CC63F cl_fff fw_400 fs_10_10 form_cnt_sec_span hissu_form_cnt_sec_span">任意</span>
    </h2>
    <div class="input_form_cnt_sec ma_20 input_form_cnt_sec_address">
        <p class="fw_500 fs_12_12 txt_input_form_cnt_sec">郵便番号</p>
        [mwform_text name="郵便番号" id="post_num" class="he_32 input_text100" size="60" placeholder=""]
    </div>
    <div class="input_form_cnt_sec ma_20 input_form_cnt_sec_address">
        <p class="fw_500 fs_12_12 txt_input_form_cnt_sec">都道府県／市区郡</p>
        [mwform_text name="都道府県市区郡" id="post_num" class="he_32 input_text100" size="60" placeholder=""]
    </div>
    <div class="input_form_cnt_sec ma_20 input_form_cnt_sec_address">
        <p class="fw_500 fs_12_12 txt_input_form_cnt_sec">丁目・番地・建物名</p>
        [mwform_text name="丁目・番地・建物名" id="post_num" class="he_32 input_text100" size="60" placeholder=""]
    </div>
</section>

<section class="form_cnt_sec">
    <h2 class="display_flex_center h2_form_cnt_sec">
        <span class="fw_600 fs_14_14 h2_form_cnt_sec_main">その他ご質問</span>
        <span class="cl_C1272D fw_500 fs_11_11 little_form_cnt_sec_main">※来場日のご希望はこちらにご記入下さい。</span>
        <span class="bg_8CC63F cl_fff fw_400 fs_10_10 form_cnt_sec_span hissu_form_cnt_sec_span">任意</span>
    </h2>
    <div class="input_form_cnt_sec ma_10 input_form_cnt_sec_etc">
        [mwform_textarea name="その他ご質問" class="he_120 textarea" cols="50" rows="5" placeholder=""]
    </div>
</section>

<section class="form_cnt_sec">
    <h2 class="display_flex_center h2_form_cnt_sec">
        <span class="fw_600 fs_14_14 h2_form_cnt_sec_main">プライバシーポリシー</span>
        <span class="bg_8C1D26 cl_fff fw_400 fs_10_10 form_cnt_sec_span hissu_form_cnt_sec_span">必須</span>
    </h2>
    <div class="read_privacy">
        [page_in_other_page page_id="3"]
    </div>
</section>

<div class="ma_20 submit_privacy">
    [mwform_checkbox name="個人情報同意について" class="checkbox_w_100_cnt" children="同意する:お問い合わせフォームを使用するにあたり株式会社アイ工務店のプライバシーポリシーに同意します。" separator=","]
</div>

<div class="ma_30 w_295 submit_contact">
    [mwform_bconfirm class="fw_600 kadomaru5 fs_18_18 he_47-4557 button_submit" value="confirm"]ご入力内容を確認する[/mwform_bconfirm]
</div>

<div class="ma_30 w_295 submit_back_thanks">
    <div class="back_button_wap">
        [mwform_bback class="fw_600 kadomaru5 fs_14_14" value="back"]入力画面へ戻る[/mwform_bback]
    </div>
    <div class="ma_20 submit_thanks">
        [mwform_bsubmit name="送信ボタン" class="fw_600 kadomaru5 fs_18_18 he_47-4557 button_submit" value="send"]入力内容を送信する[/mwform_bsubmit]
    </div>
</div>