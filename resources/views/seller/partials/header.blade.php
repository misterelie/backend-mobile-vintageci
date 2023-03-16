<header class="user_header">
    <div class="header_barre">
        <div class="header_left">
            <span class="span amount_label">
                Crédits
            </span>
        </div>
        <div class="header_right">
            <span class="amount_icon">
                <i class="bx w-icon-wallet2"></i>
            </span>
            <span class="amount">{{ Helpers::moneyFormat(User::solde())}} <sup>F CFA</sup></span>
        </div>
    </div>
</header>