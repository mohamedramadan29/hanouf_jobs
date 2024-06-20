@extends('website.layouts.master')
@section('title')
     الاسئلة الشائعه
@endsection
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper bg-center" style="background-image:url({{asset('assets/website/images/banner/1.jpg')}});">
            <div class="overlay-main site-bg-white opacity-01"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="wt-title">أسئلة مكررة</h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="index.html">بيت</a></li>
                            <li>التعليمات</li>
                        </ul>
                    </div>

                    <!-- BREADCRUMB ROW END -->
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->


        <!-- FAQ START -->
        <div class="section-full p-t120  p-b90 site-bg-white">

            <div class="container">

                <div class="section-content">
                    <div class="twm-tabs-style-1 center">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#General" type="button" role="tab" >عام</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Jobs" type="button" role="tab" aria-controls="Jobs">وظائف</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Payment" type="button" role="tab" aria-controls="Payment">قسط</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Return" type="button" role="tab" aria-controls="Return">يعود</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!--Tabs content one-->
                            <div class="tab-pane fade show active" id="General" role="tabpanel">
                                <div class="tw-faq-section">
                                    <div class="accordion tw-faq" id="sf-faq-accordion">
                                        <!--One-->
                                        <div class="accordion-item">

                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#FAQ1">
                                                أين يتم الإعلان عن وظيفتي؟
                                            </button>

                                            <div id="FAQ1" class="accordion-collapse collapse show" data-bs-parent="#sf-faq-accordion">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>

                                        </div>

                                        <!--Two-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ2" aria-expanded="false">
                                                ما الذي يجعل خطط عملك مميزة جدًا؟
                                            </button>

                                            <div id="FAQ2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>

                                        </div>

                                        <!--Three-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ3" aria-expanded="false">
                                                إعادة تعيين كلمة المرور برقم الهاتف؟
                                            </button>

                                            <div id="FAQ3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--Four-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ4" aria-expanded="false">
                                                كيف يمكنني استرداد القسيمة؟
                                            </button>

                                            <div id="FAQ4" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--Five-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ5" aria-expanded="false">
                                                كم من الوقت سيستغرق نشر وظيفتي؟
                                            </button>

                                            <div id="FAQ5" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--Six-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ6" aria-expanded="false">
                                                ما هي سياسة الإلغاء الخاصة بك؟
                                            </button>

                                            <div id="FAQ6" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--Seven-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ7" aria-expanded="false">
                                                أين يمكنني العثور على تقارير أبحاث السوق؟
                                            </button>

                                            <div id="FAQ7" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--Eight-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ8" aria-expanded="false">
                                                هل أحتاج إلى معرفة  لاستخدام the jobs؟
                                            </button>

                                            <div id="FAQ8" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--Nine-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ9" aria-expanded="false">
                                                متى سأبدأ في تلقي السير الذاتية؟
                                            </button>

                                            <div id="FAQ9" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--Tabs content two-->
                            <div class="tab-pane fade" id="Jobs" role="tabpanel">
                                <div class="tw-faq-section">
                                    <div class="accordion tw-faq" id="sf-faq-accordion-2">

                                        <!--one-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ1-2" aria-expanded="false">
                                                كيف يمكنني استرداد القسيمة؟
                                            </button>

                                            <div id="FAQ1-2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-2">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--two-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ2-2" aria-expanded="false">
                                                كم من الوقت سيستغرق نشر وظيفتي؟
                                            </button>

                                            <div id="FAQ2-2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-2">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--three-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ3-2" aria-expanded="false">
                                                ما هي سياسة الإلغاء الخاصة بك؟
                                            </button>

                                            <div id="FAQ3-2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-2">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--four-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ4-2" aria-expanded="false">
                                                أين يمكنني العثور على تقارير أبحاث السوق؟
                                            </button>

                                            <div id="FAQ4-2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-2">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--five-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ5-2" aria-expanded="false">
                                                هل أحتاج إلى معرفة  لاستخدام الوظائف؟
                                            </button>

                                            <div id="FAQ5-2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-2">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--six-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ6-2" aria-expanded="false">
                                                متى سأبدأ في تلقي السير الذاتية؟
                                            </button>

                                            <div id="FAQ6-2" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-2">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--Tabs content three-->
                            <div class="tab-pane fade" id="Payment" role="tabpanel" >
                                <div class="tw-faq-section">
                                    <div class="accordion tw-faq" id="sf-faq-accordion-3">


                                        <!--one-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ1-3" aria-expanded="false">
                                                ما الذي يجعل خطط عملك مميزة جدًا؟
                                            </button>

                                            <div id="FAQ1-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>

                                        </div>

                                        <!--two-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ2-3" aria-expanded="false">
                                                إعادة تعيين كلمة المرور برقم الهاتف؟
                                            </button>

                                            <div id="FAQ2-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--three-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ3-3" aria-expanded="false">
                                                كيف يمكنني استرداد القسيمة؟
                                            </button>

                                            <div id="FAQ3-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--four-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ4-3" aria-expanded="false">
                                                كم من الوقت سيستغرق نشر وظيفتي؟
                                            </button>

                                            <div id="FAQ4-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--five-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ5-3" aria-expanded="false">
                                                ما هي سياسة الإلغاء الخاصة بك؟
                                            </button>

                                            <div id="FAQ5-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--six-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ6-3" aria-expanded="false">
                                                أين يمكنني العثور على تقارير أبحاث السوق؟
                                            </button>

                                            <div id="FAQ6-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--seven-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ7-3" aria-expanded="false">
                                                هل أحتاج إلى معرفة  لاستخدام الوظائف؟
                                            </button>

                                            <div id="FAQ7-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--eight-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ8-3" aria-expanded="false">
                                                متى سأبدأ في تلقي السير الذاتية؟
                                            </button>

                                            <div id="FAQ8-3" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-3">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--Tabs content Four-->
                            <div class="tab-pane fade" id="Return" role="tabpanel" >
                                <div class="tw-faq-section">
                                    <div class="accordion tw-faq" id="sf-faq-accordion-4">

                                        <!--one-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ1-4" aria-expanded="false">
                                                كم من الوقت سيستغرق نشر وظيفتي؟
                                            </button>

                                            <div id="FAQ1-4" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-4">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--two-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ2-4" aria-expanded="false">
                                                ما هي سياسة الإلغاء الخاصة بك؟
                                            </button>

                                            <div id="FAQ2-4" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-4">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--three-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ3-4" aria-expanded="false">
                                                أين يمكنني العثور على تقارير أبحاث السوق؟
                                            </button>

                                            <div id="FAQ3-4" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-4">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--four-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ4-4" aria-expanded="false">
                                                Do I need to know  to use the jobs?
                                            </button>

                                            <div id="FAQ4-4" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-4">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                        <!--five-->
                                        <div class="accordion-item">

                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQ5-4" aria-expanded="false">
                                                متى سأبدأ في تلقي السير الذاتية؟
                                            </button>

                                            <div id="FAQ5-4" class="accordion-collapse collapse" data-bs-parent="#sf-faq-accordion-4">
                                                <div class="accordion-body">
                                                    الواجهة الرقمية يقوم الشخص الذي يتسبب في حركة البضائع بتحميل المعلومات ذات الصلة قبل بدء حركة البضائع وإنشاء فاتورة في الاتجاه الإلكتروني على بوابة GST. أفضل خدمة تزودنا. ببساطة، نص وهمي للطباعة وصناعة أدوات الطباعة. كان  هو دمية الصناعة القياسية.
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </div>

        </div>
        <!-- FAQ END -->



    </div>
    <!-- CONTENT END -->
@endsection
