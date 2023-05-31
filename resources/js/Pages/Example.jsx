import ReactDOM from "react-dom/client";
import React, { useState } from "react";
import Button from "react-bootstrap/Button";
import Modal from "react-bootstrap/Modal";
import { Link } from '@inertiajs/inertia-react'
function Example() {
    const [show, setShow] = useState(false);
    const [open, setOpen] = useState(false);

    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);
    const handleOpen = () => setOpen(true);
    const handleShut = () => setOpen(false);
    return (
        <div>
            <header
                id="header"
                className="header fixed-top d-flex align-items-center"
            >
                <div className="d-flex align-items-center justify-content-between">
                    <i
                        className="bi bi-list toggle-sidebar-btn color_white"
                        style={{ width: "85px" }}
                    />
                    <a
                        href="index.html"
                        className="logo d-flex align-items-center"
                    >
                        <img
                            src="https://cdn.strpst.com//icons/headerlogo_stripchat.global.png?v=9d31abb7"
                            alt=""
                        />
                        {/* 
        <span class="d-none d-lg-block">Chat demo</span> */}
                    </a>
                </div>
                {/* End Logo */}
                <div>
                    <sanp className="color-white text-upper"> 6435 Live</sanp>
                </div>
                <div className="search-bar">
                    <form
                        className="search-form d-flex align-items-center"
                        method="POST"
                        action="#"
                    >
                        <input
                            type="text"
                            name="query"
                            placeholder="Search"
                            title="Enter search keyword"
                        />
                        <button type="submit" title="Search">
                            <i className="bi bi-search" />
                        </button>
                    </form>
                </div>
                {/* End Search Bar */}
                <nav className="header-nav ms-auto">
                    <ul className="d-flex align-items-center">
                        <li className="nav-item d-block d-lg-none">
                            <a
                                className="nav-link nav-icon search-bar-toggle "
                                href="#"
                            >
                                <i className="bi bi-search" />
                            </a>
                        </li>
                        {/* End Search Icon*/}
                        <li className="nav-item d-block">
                            <a
                                className="nav-link nav-icon search-bar-toggle loginLink bg_button"
                                href="#"
                                onClick={handleOpen}
                            >
                                Create Free Account
                            </a>
                        </li>
                        <li className="nav-item d-block">
                            <a
                                className="nav-link nav-icon search-bar-toggle loginLink outline_button"
                                onClick={handleShow}
                                href="#"
                            >
                                Log In
                            </a>
                        </li>
                    </ul>
                </nav>
                {/* End Icons Navigation */}
            </header>
            {/* End Header */}

            {/* <Modal
                show={show}
                onHide={handleClose}
                style={{ border: "1px solid red" }}
            >
                <Modal.Header closeButton className="flex-modal overlay">
                    <Modal.Title className="flex-modal overlay">
              
                        Login
                    </Modal.Title>
                </Modal.Header>
                <Modal.Body className="flex-modal overlay">
                    <div className="flex-container">
                        <div className="bold-line" />
                        <div>
                            <div>
                                <div />
                                <div className="content">
                                    <div className="welcome">Hello There!</div>
                                    <div className="subtitle">
                                        We're almost done. Before using our
                                        services you need to create an account.
                                    </div>
                                    <div className="input-fields">
                                        <input
                                            type="text"
                                            placeholder="Username"
                                            className="input-line full-width"
                                        />
                                        <input
                                            type="email"
                                            placeholder="Email"
                                            className="input-line full-width"
                                        />
                                        <input
                                            type="password"
                                            placeholder="Password"
                                            className="input-line full-width"
                                        />
                                    </div>
                                    <div className="spacing">
                                        or continue with{" "}
                                        <span className="highlight">
                                            Facebook
                                        </span>
                                    </div>
                                    <div>
                                        <button className="ghost-round full-width">
                                            Create Account
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </Modal.Body>
                <Modal.Footer className="flex-modal form-container ">
                    <Button variant="secondary" onClick={handleClose}>
                        Close
                    </Button>
                    <Button variant="primary" onClick={handleClose}>
                        SUBMIT
                    </Button>
                </Modal.Footer>
            </Modal> */}

            <Modal  show={show} onHide={handleClose} >
                <Modal.Header style={{display:'flex', flexDirection:'row',backgroundColor: "#391c1f" }}>
                    <Modal.Title
                        style={{
                            color: "#cac5c6",
                            fontSize: "24px",
                            fontWeight: 600,
                            textAlign: "center",
                            marginTop: "50px",
                            marginLeft: "200px",
                        }}
                    >
                      
                      Log In
                    </Modal.Title>
                </Modal.Header>
                <Modal.Body style={{ background: "#391d20", }}>
                    <div className="flex-container">
                        <div className="bold-line" />
                        <div>
                            <div>
                                <div />
                                <div className="content">
                                    <div className="input-fields">
                                        <input
                                            type="text"
                                            placeholder="Username or Email"
                                            className="input-line full-width"
                                            style={{
                                                borderRadius: "20px",
                                                color: "white",
                                                fontSize: "20px",
                                                background: "#433638",
                                                margin: "auto auto auto 68px",
                                                border: "none",
                                                textAlign:'left',
                                                padding: "10px 60px",
                                            }}
                                        />
                                        <br />
                                        <br />

                                        <input
                                            type="password"
                                            placeholder="Password"
                                            className="input-line full-width"
                                            style={{
                                                borderRadius: "20px",
                                                color: "white",
                                                fontSize: "20px",
                                                background: "#433638",
                                                margin: "auto auto auto 68px",
                                                border: "none",
                                                
                                                padding: "10px 60px",
                                                textAlign:'left'
                                            }}
                                        />
                                    </div>
                                    <br />
                                    <div
                                        className="spacing"
                                        style={{textAlign:'center' }}
                                    >
                                        or continue with    
                                        <span className="highlight">
                                            Facebook
                                        </span>
                                    </div>
                                    <div>
                                        <br />
                                        <button
                                            className="ghost-round full-width"
                                            style={{
                                                background: "#1e9b4b",
                                                borderRadius: "20px",
                                                border: "none",
                                                color: "white",
                                                fontSize: "25px",
                                                padding: "5px 108px",
                                                width:'70%',
                                                margin: "auto auto auto 68px",
                                                
                                            }}
                                        >
                                            Log In
                                        </button>
                                    </div>
                                    <br/>
                                    <div
                                        style={{
                                            textAlign:'center'
                                        }}
                                    >
                                        <span>Forgot Password?</span>
                                    </div>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <div
                                        style={{
                                            textAlign:'center'
                                        }}
                                    >
                                        <span>or log in with</span>
                                    </div>
                                    <br/>
                                    <div style={{display:'flex'}}>
                                        <button
                                            id="google-logo"
                                            style={{
                                                borderRadius: "20px",
                                                color: "white",
                                                fontSize: "20px",
                                                background: "#433638",
                                                margin: "auto auto auto 70px",
                                                border: "none",

                                                padding: "10px 40px",
                                            }}
                                        >
                                            Google
                                        </button>
                                        <button
                                            id="google-logo"
                                            style={{
                                                borderRadius: "20px",
                                                color: "white",
                                                fontSize: "20px",
                                                background: "#433638",
                                                margin: "auto auto auto 20px",
                                                border: "none",

                                                padding: "10px 40px",
                                            }}
                                        >
                                            Twitter
                                        </button>
                                    </div>
                                    <br/>
                                    <div
                                        style={{
                                            textAlign:'center'
                                        }}
                                    >
                                        <span>Log In without Password</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </Modal.Body>
                {/* <Modal.Footer className="flex-modal form-container ">
                    <Button variant="secondary" onClick={handleClose}
                    style={{}}>
                        Close
                    </Button>
                    <Button variant="primary" onClick={handleClose}>
                        SUBMIT
                    </Button>
                </Modal.Footer> */}
            </Modal>

            {/******************* Create Account Modal ************/}
            <Modal show={open} onHide={handleShut} >
                <Modal.Header style={{ backgroundColor: "#391c1f" ,display:'flex', flexDirection:'row'}}>
                    <Modal.Title
                        style={{
                            color: "#cac5c6",
                            fontSize: "24px",
                            fontWeight: 600,
                            textAlign: "center",
                            marginTop: "50px",
                            marginLeft: "150px",
                        }}
                    >
                        Create Account
                    </Modal.Title>
                </Modal.Header>
                <Modal.Body style={{ background: "#391d20" }}>
                    <div className="flex-container " style={{display:'flex', flexDirection:'row'}}>
                        <div className="bold-line" style={{display:'flex', flexDirection:'row'}} />
                        <div>
                            <div>
                                <div />
                                <div className="content">
                                    <div className="input-fields">
                                        <input
                                            type="text"
                                            placeholder="Username "
                                            className="input-line full-width"
                                            style={{
                                                borderRadius: "20px",
                                                color: "white",
                                                fontSize: "20px",
                                                background: "#433638",
                                                margin: "auto auto auto 68px",
                                                border: "none",
                                                
                                                padding: "10px 60px",
                                            }}
                                        />
                                            <i style={{border:'1px solid red'}} class="fa-solid fa-wand-magic-sparkles"></i>
                                        <br />
                                        <br />
                                        <button
                                            className="ghost-round full-width"
                                            style={{
                                                background: "#1e9b4b",
                                                borderRadius: "20px",
                                                border: "none",
                                                color: "white",
                                                fontSize: "15px",
                                                padding: "10px 108px",
                                                margin: "auto auto auto 68px",
                                            }}
                                        >
                                            Create Free Account
                                        </button>
                                    </div>
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />

                                    <div
                                        style={{
                                            textAlign:'center'
                                        }}
                                    >
                                        <span>or continue with</span>
                                    </div>
                                    <br/>
                                    <div style={{display:'flex'}}>
                                        <button
                                            id="google-logo"
                                            style={{
                                                borderRadius: "20px",
                                                color: "white",
                                                fontSize: "20px",
                                                background: "#433638",
                                                margin: "auto auto auto 70px",
                                                border: "none",

                                                padding: "10px 40px",
                                            }}
                                        >
                                            Google
                                        </button>
                                        <button
                                            id="google-logo"
                                            style={{
                                                borderRadius: "20px",
                                                color: "white",
                                                fontSize: "20px",
                                                background: "#433638",
                                                margin: "auto auto auto 20px",
                                                border: "none",

                                                padding: "10px 40px",
                                            }}
                                        >
                                            Twitter
                                        </button>
                                    </div>
                                        <br/>
                                        <div>
                                        <input
                                            type="text"
                                            placeholder="Sign Up with Email "
                                            className="input-line full-width"
                                            style={{
                                                borderRadius: "20px",
                                                color: "white",
                                                fontSize: "20px",
                                                background: "#433638",
                                                margin: "auto auto auto 68px",
                                                border: "none",

                                                padding: "10px 60px",
                                                textAlign:'center'
                                            }}
                                        /> 
                                        </div>
                                </div>
                                <br/>
                                <div
                                        style={{
                                            textAlign:'center',
                                            color: "#5b5c5d",
                                        }}
                                    >
                                        <span>Already have an account? 
                                             <strong style={{color:'white'}}> Log In</strong></span>
                                    </div>
                            </div>
                            <br/>
                        </div>
                    </div>

                    {/* <div className="flex-container">
                        <div className="bold-line" />
                        <div>
                            <div>
                                <div />
                                <div className="content">
                                    <div className="input-fields">
                                        <input
                                            type="text"
                                            placeholder="Username "
                                            className="input-line full-width"
                                            style={{
                                                borderRadius: "20px",
                                                color: "white",
                                                fontSize: "20px",
                                                background: "#433638",
                                                margin: "auto auto auto 68px",
                                                border: "none",
                                                
                                                padding: "10px 60px",
                                            }}
                                        />
                                            <i style={{border:'1px solid red'}} class="fa-solid fa-wand-magic-sparkles"></i>
                                        <br />
                                        <br />
                                        <button
                                            className="ghost-round full-width"
                                            style={{
                                                background: "#1e9b4b",
                                                borderRadius: "20px",
                                                border: "none",
                                                color: "white",
                                                fontSize: "15px",
                                                padding: "10px 108px",
                                                margin: "auto auto auto 68px",
                                            }}
                                        >
                                            Create Free Account
                                        </button>
                                    </div>
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />

                                    <div
                                        style={{
                                            textAlign:'center'
                                        }}
                                    >
                                        <span>or continue with</span>
                                    </div>
                                    <br/>
                                    <div style={{display:'flex'}}>
                                        <button
                                            id="google-logo"
                                            style={{
                                                borderRadius: "20px",
                                                color: "white",
                                                fontSize: "20px",
                                                background: "#433638",
                                                margin: "auto auto auto 70px",
                                                border: "none",

                                                padding: "10px 40px",
                                            }}
                                        >
                                            Google
                                        </button>
                                        <button
                                            id="google-logo"
                                            style={{
                                                borderRadius: "20px",
                                                color: "white",
                                                fontSize: "20px",
                                                background: "#433638",
                                                margin: "auto auto auto 20px",
                                                border: "none",

                                                padding: "10px 40px",
                                            }}
                                        >
                                            Twitter
                                        </button>
                                    </div>
                                        <br/>
                                        <div>
                                        <input
                                            type="text"
                                            placeholder="Sign Up with Email "
                                            className="input-line full-width"
                                            style={{
                                                borderRadius: "20px",
                                                color: "white",
                                                fontSize: "20px",
                                                background: "#433638",
                                                margin: "auto auto auto 68px",
                                                border: "none",

                                                padding: "10px 60px",
                                                textAlign:'center'
                                            }}
                                        /> 
                                        </div>
                                </div>
                                <br/>
                                <div
                                        style={{
                                            textAlign:'center',
                                            color: "#5b5c5d",
                                        }}
                                    >
                                        <span>Already have an account? 
                                             <strong style={{color:'white'}}> Log In</strong></span>
                                    </div>
                            </div>
                            <br/>
                        </div>
                    </div> */}
                </Modal.Body>
                
            </Modal>

            {/* ======= Sidebar ======= */}
            <aside
                id="sidebar"
                className="sidebar"
                style={{
                    minHeight: "100vh",
                    height: "50vh",
                    overflowY: "scroll",
                }}
            >
                <ul className="sidebar-nav" id="sidebar-nav">
                    <li className="nav-item">
                        <a className="nav-link active" href="index.html">
                            <i className="bi bi-home" />
                            <span>Home</span>
                        </a>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link" href="index.html">
                            <i className="bi bi-home" />
                            <span>Feed</span>
                        </a>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link" href="index.html">
                            <i className="bi bi-home" />
                            <span>Recommended</span>
                        </a>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link" href="index.html">
                            <i className="bi bi-home" />
                            <span>My Favorites11</span>
                        </a>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link" href="index.html">
                            <i className="bi bi-home" />
                            <span>Watch History</span>
                        </a>
                    </li>
                    <br />
                    <hr />
                    <br />
                    <p>Specials</p>
                    <li className="nav-item">
                        <a className="nav-link" href="index.html">
                            <i className="bi bi-home" />
                            <span>India</span>
                        </a>
                    </li>
                </ul>
            </aside>
            {/* End Sidebar*/}
            <main id="main" className="main">
                <section className="section">
                    <div className="row align-items-top">
                        <div className="col-lg-2 col-6">
                            <a href="#" className="card list">
                                <img
                                    src="/img/messages-1.jpg"
                                    className="card-img-top"
                                    alt="..."
                                />
                                <div className="caption">
                                    <span>Abhay-sexy</span>
                                </div>
                            </a>
                        </div>
                        <div className="col-lg-2 col-6">
                            <a href="#" className="card list">
                                <img
                                    src="/img/messages-1.jpg"
                                    className="card-img-top"
                                    alt="..."
                                />
                                <div className="caption">
                                    <span>Abhay-sexy</span>
                                </div>
                            </a>
                        </div>
                        <div className="col-lg-2 col-6">
                            <a href="#" className="card list">
                                <img
                                    src="/img/messages-1.jpg"
                                    className="card-img-top"
                                    alt="..."
                                />
                                <div className="caption">
                                    <span>Abhay-sexy</span>
                                </div>
                            </a>
                        </div>
                        <div className="col-lg-2 col-6">
                            <a href="#" className="card list">
                                <img
                                    src="/img/messages-1.jpg"
                                    className="card-img-top"
                                    alt="..."
                                />
                                <div className="caption">
                                    <span>Abhay-sexy</span>
                                </div>
                            </a>
                        </div>
                        <div className="col-lg-2 col-6" >
                        <Link href="/livestream" className="card list">
                            
                                <img
                                    src="/img/messages-1.jpg"
                                    className="card-img-top"
                                    alt="..."
                                />
                                <div className="caption">
                                    <span>Abhay-sexy321</span>
                                </div>
                           
                            </Link>
                        </div>
                        <div className="col-lg-2 col-6">
                            <a href="#" className="card list">
                                <img
                                    src="/img/messages-1.jpg"
                                    className="card-img-top"
                                    alt="..."
                                />
                                <div className="caption">
                                    <span>Abhay-sexy</span>
                                </div>
                            </a>
                        </div>
                        <div className="col-lg-2 col-6">
                            <a href="#" className="card list">
                                <img
                                    src="/img/messages-1.jpg"
                                    className="card-img-top"
                                    alt="..."
                                />
                                <div className="caption">
                                    <span>Abhay-sexy</span>
                                </div>
                            </a>
                        </div>
                        <div className="col-lg-2 col-6">
                            <a href="#" className="card list">
                                <img
                                    src="/img/messages-1.jpg"
                                    className="card-img-top"
                                    alt="..."
                                />
                                <div className="caption">
                                    <span>Abhay-sexy</span>
                                </div>
                            </a>
                        </div>
                        <div className="col-lg-2 col-6">
                            <a href="#" className="card list">
                                <img
                                    src="/img/messages-1.jpg"
                                    className="card-img-top"
                                    alt="..."
                                />
                                <div className="caption">
                                    <span>Abhay-sexy</span>
                                </div>
                            </a>
                        </div>
                        <div className="col-lg-2 col-6">
                            <a href="#" className="card list">
                                <img
                                    src="/img/messages-1.jpg"
                                    className="card-img-top"
                                    alt="..."
                                />
                                <div className="caption">
                                    <span>Abhay-sexy</span>
                                </div>
                            </a>
                        </div>
                        <div className="col-lg-2 col-6">
                            <a href="#" className="card list">
                                <img
                                    src="/img/messages-1.jpg"
                                    className="card-img-top"
                                    alt="..."
                                />
                                <div className="caption">
                                    <span>Abhay-sexy</span>
                                </div>
                            </a>
                        </div>
                        <div className="col-lg-2 col-6">
                            <a href="#" className="card list">
                                <img
                                    src="/img/messages-1.jpg"
                                    className="card-img-top"
                                    alt="..."
                                />
                                <div className="caption">
                                    <span>Abhay-sexy</span>
                                </div>
                            </a>
                        </div>
                        <div className="col-lg-2 col-6">
                            <a href="#" className="card list">
                                <img
                                    src="/img/messages-1.jpg"
                                    className="card-img-top"
                                    alt="..."
                                />
                                <div className="caption">
                                    <span>Abhay-sexy</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div className="row alignitem_center">
                        <div className="col-md-5 border_botton" />
                        <div className="col-md-2 text-center">
                            <button className="btn btn-default see-more-button">
                                See More
                            </button>
                        </div>
                        <div className="col-md-5 border_botton" />
                    </div>
                </section>
            </main>
            {/* End #main */}
            <footer
                className="site-footer section"
                style={{
                    bottom: 0,
                    position: "relative",
                    marginLeft: 0,
                    zIndex: 2,
                    width: "100%",
                }}
            >
                <div className="container">
                    <div className="row">
                        <div className="col-sm-12 col-md-6">
                            <h6>About</h6>
                            <p className="text-justify">
                                Welcome to Stripchat Global! We're a free online
                                community where you can come and watch our
                                amazing amateur models perform live interactive
                                shows.
                                <br />
                                <br /> Stripchat Global is 100% free and access
                                is instant. Browse through hundreds of models
                                from Women, Men, Couples, and Transsexuals
                                performing live sex shows 24/7. Besides watching
                                free live cam shows, you also have the option
                                for Private shows, spying, Cam to Cam, and
                                messaging models.
                                <br />
                                <br />
                                All models appearing on this site have
                                contractually confirmed to us that they are 18
                                years of age or older.
                            </p>
                        </div>
                        <div className="col-xs-4 col-md-2">
                            <h6>LEGAL AND SAFETY</h6>
                            <hr />
                            <ul className="footer-links">
                                <li>
                                    <a href="http://scanfcode.com/privacy-policy/">
                                        Privacy Policy
                                    </a>
                                </li>
                                <hr />
                                <li>
                                    <a href="http://scanfcode.com/category/front-end-development/">
                                        Terms of Use
                                    </a>
                                </li>
                                <hr />
                                <li>
                                    <a href="http://scanfcode.com/category/back-end-development/">
                                        DMCA Policy
                                    </a>
                                </li>
                                <hr />
                                <li>
                                    <a href="http://scanfcode.com/category/java-programming-language/">
                                        Cookies Policy
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div className="col-xs-4 col-md-2">
                            <h6>WORK WITH US</h6>
                            <hr />
                            <ul className="footer-links">
                                <li>
                                    <a href="http://scanfcode.com/about/">
                                        Become a Model
                                    </a>
                                </li>
                                <hr />
                                <li>
                                    <a href="http://scanfcode.com/contact/">
                                        Studio Signup
                                    </a>
                                </li>
                                <hr />
                                <li>
                                    <a href="http://scanfcode.com/contribute-at-scanfcode/">
                                        Affiliate Program
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div className="col-xs-4 col-md-2">
                            <h6>HELP & SUPPORT</h6>
                            <hr />
                            <ul className="footer-links">
                                <li>
                                    <a href="http://scanfcode.com/about/">
                                        Contact & Support
                                    </a>
                                </li>
                                <hr />
                                <li>
                                    <a href="http://scanfcode.com/contact/">
                                        Billing Support
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr />
                </div>
                <div className="container">
                    <div className="row">
                        <div className="col-md-8 col-sm-6 col-xs-12">
                            <div class="footer-label">
                                <svg class="icon icon-rta-logo"></svg>
                            </div>
                            <p
                                className="copyright-text"
                                style={{
                                    textAlign: "center",
                                    marginLeft: "370px",
                                }}
                            >
                                18 U.S.C. 2257 Record-Keeping Requirements
                                Compliance Statement
                            </p>
                        </div>
                        <div className="col-md-4 col-sm-6 col-xs-12">
                            <ul className="social-icons">
                                <li>
                                    <a className="facebook" href="#">
                                        <i className="fa fa-facebook" />
                                    </a>
                                </li>
                                <li>
                                    <a className="twitter" href="#">
                                        <i className="fa fa-twitter" />
                                    </a>
                                </li>
                                <li>
                                    <a className="dribbble" href="#">
                                        <i className="fa fa-dribbble" />
                                    </a>
                                </li>
                                <li>
                                    <a className="linkedin" href="#">
                                        <i className="fa fa-linkedin" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    );
}

export default Example;
0;

if (document.getElementById("example")) {
    const Index = ReactDOM.createRoot(document.getElementById("example"));

    Index.render(
        <React.StrictMode>
            <Example />
        </React.StrictMode>
    );
}
