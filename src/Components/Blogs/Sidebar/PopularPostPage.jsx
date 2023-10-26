import { popularPosts } from "../../../Data/BlogData";

const PopularPostPage = () => {
    return (
      <div className="blog-wrapper">
        <div className="sidebar-title">
          <h5>{"Popular Post"}</h5>
        </div>
        <div className="sidebar-content">
          <ul className="blog-post">
            {popularPosts.map((post, index) => (
              <li key={index}>
                <div className="media">
                  <img className="img-fluid" src={post.image} alt="Generic placeholder image" />
                  <div className="media-body align-self-center">
                    <div>
                      <h6>{post.date}</h6>
                      <p>{post.hits} hits</p>
                    </div>
                  </div>
                </div>
              </li>
            ))}
          </ul>
        </div>
      </div>
    );
  };

  export default PopularPostPage;