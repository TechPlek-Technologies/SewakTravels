import { useState } from "react";
import NewsLetterContent from "./NewsLetterContent";
import BodyContent from "./BodyContent";
import { tabs } from "../../../Data/FaqContent";
import { Link } from "react-router-dom";

const FaqContent = () => {
 
  const [activeTab, setActiveTab] = useState(tabs[0].id);

  const handleTabClick = (tabId) => {
    setActiveTab(tabId);
  };

  return (
    <section className="small-section bg-inner other-faq" data-sticky_parent>
      <div className="container">
        <div className="row">
          <div className="col-lg-3">
            <div className="pro_sticky_info" data-sticky_column>
              <div className="faq-tab">
                <ul className="nav nav-tabs" id="top-tab" role="tablist">
                  {tabs.map((tab, index) => (
                    <li className="nav-item" key={index}>
                      <Link
                        to="#"
                        className={`nav-link ${
                          activeTab === tab.id ? "active" : ""
                        }`}
                        onClick={() => handleTabClick(tab.id)}
                      >
                        {tab.label}
                      </Link>
                    </li>
                  ))}
                </ul>
              </div>
              <div className="single-section mt-3 d-none d-lg-block">
                <NewsLetterContent titleClass="single-sidebar p-0" />
              </div>
            </div>
          </div>
          <div className="col-lg-9">
            <div className="product_img_scroll" data-sticky_column>
              <div className="faq-content tab-content" id="top-tabContent">
                {tabs.map((tab, index) => (
                  <div
                    className={`tab-pane fade ${
                      activeTab === tab.id ? "show active" : ""
                    }`}
                    id={tab.id}
                    key={index}
                  >
                    <BodyContent tabId={tab.id} content={tab.content} />
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default FaqContent;
