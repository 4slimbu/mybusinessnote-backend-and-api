import React from 'react'
import LeftSection from "./LeftSection";
import MainSection from "./MainSection";
import RightSection from "./RightSection";

const Main = () => (
    <div id="page" className="hfeed site">
        <div id="content" className="site-content">
            <div id="primary" className="content-area">
                <main id="main" className="site-main">
                    <div className="section-wrapper">
                        <LeftSection />
                        <MainSection />
                        <RightSection />
                    </div>
                </main>
                {/* #main */}
            </div>
            {/* #primary */}
        </div>
        {/* #content */}
    </div>
);

export default Main;

