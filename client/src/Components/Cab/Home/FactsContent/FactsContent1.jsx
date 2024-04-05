const FactsContent1= () => {
    const factsData = [
        { icon: "/assets/images/icon/facts/1.png", counter: 2745, label: "Happy Client" },
        { icon: "/assets/images/icon/facts/2.png", counter: 953, label: "Complete Tour" },
        { icon: "/assets/images/icon/facts/3.png", counter: 450, label: "Guiders" },
        { icon: "/assets/images/icon/facts/4.png", counter: 29, label: "Tour States" },
      ];
    return (
        <section class="facts-section animated-section section-b-space">
        <img src="../assets/images/cab/grey-bg.jpg" alt="" class="img-fluid blur-up lazyload bg-img"/>
        <div class="animation-section">
            <div class="cross po-1"></div>
            <div class="cross po-2"></div>
            <div class="cross po-3"></div>
            <div class="round po-4"></div>
            <div class="round po-5"></div>
            <div class="round r-2 po-6"></div>
            <div class="round r-2 po-7"></div>
            <div class="round r-y po-8"></div>
            <div class="round r-y po-9"></div>
            <div class="square po-10"></div>
            <div class="square po-11"></div>
            <div class="square s-2 po-12"></div>
        </div>
        <div class="container">
            <div class="title-1">
                <span class="title-label">Sewak Travels</span>
                <h2>no stories, facts only</h2>
            </div>
            <div class="row">
            {factsData.map((fact, index) => (
                <div key={index} class="col-lg-3 col-6">
                    <div class="facts-box">
                        <div>
                            <div class="img">
                                <img src={fact.icon} class="img-fluid lazyload" alt=""/>
                            </div>
                            <h3 class="counter">{fact.counter}</h3>
                            <h6>{fact.label}</h6>
                        </div>
                    </div>
                </div>
                ))}
            </div>
        </div>
    </section>
    );
  };
  
  export default FactsContent1;
  