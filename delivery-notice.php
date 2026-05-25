<style>
    .notice {
        background: #fff8ee;
        border: 2.5px solid transparent;
        border-radius: 10px;
        padding: 12px 14px;
        font-family: 'Noto Sans Bengali', sans-serif;
        position: relative;
        overflow: hidden;
        background:
            linear-gradient(#fff8ee, #fff8ee) padding-box,
            linear-gradient(90deg, #E8A020, #fff200, #ff4b00, #fff200, #E8A020) border-box;
        background-size: 100% 100%, 260% 100%;
        animation: noticeRunningBorder 1.1s linear infinite, noticeGlow 1.6s ease-in-out infinite;
    }

    .notice::before {
        content: "";
        position: absolute;
        top: 0;
        left: -70%;
        width: 45%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .75), transparent);
        transform: skewX(-18deg);
        animation: noticeShine 3.6s ease-in-out infinite;
        pointer-events: none;
    }

    .notice-title {
        font-size: 13px;
        font-weight: 700;
        color: #cc5500;
        text-align: center;
        margin-bottom: 10px;
        animation: noticeTitlePop 1.2s ease-in-out infinite;
    }

    .dates {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 10px
    }

    .date-box {
        background: #E8A020;
        border-radius: 8px;
        padding: 7px 10px;
        text-align: center;
        animation: dateBoxPulse 1.6s ease-in-out infinite;
    }

    .date-box:nth-child(2) {
        animation-delay: .25s;
    }

    .date-box span {
        font-size: 12.5px;
        font-weight: 700;
        color: #fff;
        white-space: nowrap
    }

    .tip {
        font-size: 12px;
        color: #855000;
        background: #fff3d6;
        border-radius: 6px;
        padding: 7px 10px;
        line-height: 1.6;
        text-align: center;
    }

    @keyframes noticeRunningBorder {

        0% {
            background-position: 0 0, 0% 0;
        }

        100% {
            background-position: 0 0, 260% 0;
        }
    }

    @keyframes noticeGlow {

        0%,
        100% {
            box-shadow: 0 0 0 rgba(255, 75, 0, 0), 0 0 0 rgba(255, 242, 0, 0);
        }

        50% {
            box-shadow: 0 0 18px rgba(255, 75, 0, .42), 0 0 30px rgba(255, 242, 0, .28);
        }
    }

    @keyframes noticeShine {

        0%,
        55% {
            left: -70%;
        }

        78%,
        100% {
            left: 125%;
        }
    }

    @keyframes noticeTitlePop {

        0%,
        100% {
            transform: scale(1);
        }

        45% {
            transform: scale(1.04);
        }
    }

    @keyframes dateBoxPulse {

        0%,
        100% {
            transform: translateY(0);
        }

        45% {
            transform: translateY(-2px);
        }
    }

    @media (prefers-reduced-motion: reduce) {

        .notice,
        .notice::before,
        .notice-title,
        .date-box {
            animation: none;
        }

        .notice {
            border-color: #E8A020;
            background: #fff8ee;
            box-shadow: none;
        }
    }
</style>

<div class="notice">
    <div class="notice-title">🚚 সম্ভাব্য ডেলিভারি সময়</div>
    <div class="dates">
        <div class="date-box"><span>🏙 ঢাকার ভিতরে: ২–৩ জুন</span></div>
        <div class="date-box"><span>📦 ঢাকার বাইরে: ২–৪ জুন</span></div>
    </div>
    <div class="tip">✔️ অনুগ্রহ করে এই সময়ের মধ্যে <span style="color: #cc5500;font-weight: 700;">আপনি যেখানে থাকবেন</span>, সেই ঠিকানা দিয়ে অর্ডারটি প্লেস করুন, যাতে ডেলিভারি সহজে সম্পন্ন করা যায়।</div>
</div>
