import React, {Component} from 'react';

export default class LeftSection extends Component {
    render() {
        return (
            <section className="left-sec bg-navy">
                <a href="level1_step_1.html" className="site-branding">
                    <img src="html/images/apps-logo.png" alt="" />
                </a>
                <h3 className="tagline-head">Let your <br/>journey begins</h3>
                <div className="menu-accordion">
                    <div className="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                        <div className="panel panel-default panel-faq active">
                            <div className="panel-heading" role="tab" id="headingEight">
                                <div className="panel-title clearfix">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseEight" aria-expanded="true" aria-controls="collapseOne">
                                        <figure><img src="html/images/journey/img_1.png" alt="" /></figure>
                                        <h6>Getting<br/> started</h6>
                                    </a>
                                </div>
                            </div>
                            <div id="collapseEight" className="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingEight">
                                <div className="panel-body">
                                    <ul className="getting-start-list">
                                        <li><a href="level1_step_1.html">
                                            <span className="circle-span complete"></span>Your business</a>
                                        </li>
                                        <li><a href="level1_step_4.html"><span className="circle-span"></span>About you</a></li>
                                        <li><a href="level1_step_5.html"><span className="circle-span"></span>Your business</a></li>
                                        <li><a href="level1_step_6.html"><span className="circle-span"></span>Register your business</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div className="panel panel-default panel-faq">
                            <div className="panel-heading" role="tab" id="headingNine">
                                <div className="panel-title clearfix">
                                    <a className="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                        <figure><img src="html/images/journey/img_2.png" alt="" /></figure>
                                        <h6>Setting the <br/>foundation</h6>
                                    </a>
                                </div>
                            </div>
                            <div id="collapseNine" className="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
                                <div className="panel-body">
                                    <ul className="getting-start-list">
                                        <li>
                                            <a href="level2_marketing_1.html">
                                                <span className="circle-span"></span>Marketing
                                            </a></li>
                                        <li><a href="level2_finance_1.html"><span className="circle-span"></span>Finances</a></li>
                                        <li><a href="level2_operation_1.html"><span className="circle-span"></span>Operations</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div className="panel panel-default panel-faq">
                            <div className="panel-heading" role="tab" id="headingTen">
                                <div className="panel-title clearfix">
                                    <a className="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                        <figure><img src="html/images/journey/img_3.png" alt="" /></figure>
                                        <h6>Building up the<br/> business</h6>
                                    </a>
                                </div>
                            </div>
                            <div id="collapseTen" className="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
                                <div className="panel-body">
                                    <ul className="getting-start-list">
                                        <li><a href="level3_marketing_1.html"><span className="circle-span"></span>Marketing </a></li>
                                        <li><a href="#"><span className="circle-span"></span>Legal</a></li>
                                        <li><a href="level3_humanresource_1.html"><span className="circle-span"></span>Human resources</a></li>
                                        <li><a href="level3_operations_1.html"><span className="circle-span"></span>Operations</a></li>
                                        <li><a href="level3_finance_1.html"><span className="circle-span"></span>Finances</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        );
    }
}