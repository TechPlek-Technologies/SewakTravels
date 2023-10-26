import { Link } from "react-router-dom";

const Updates = () => {
  const news = [
    {
      id: 1,
      img: "/assets/images/cab/blog-footer/1.jpg",
      title: "recent news",
      description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 00s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
    },
    {
      id: 2,
      img: "/assets/images/cab/blog-footer/2.jpg",
      title: "recent news",
      description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 00s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
    },
  ];
  return (
    <div className="col-xl-3 col-md-6">
      <div className="footer-title">
        <h5>{"New Topics"}</h5>
      </div>
      <div className="footer-content">
        <div className="footer-blog">
          {news.map((news,index) => (
            <div className="media" key={index}>
              <div className="img-part">
                <Link href="/pages/blog-pages/creative-left-sidebar">
                  <img src={news.img} className="img-fluid" alt="" width={96} height={96} />
                </Link>
              </div>
              <div className="media-body">
              <Link href="/pages/blog-pages/creative-left-sidebar"><h5>{news.title}</h5></Link>
                <p>{news.description}</p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default Updates;