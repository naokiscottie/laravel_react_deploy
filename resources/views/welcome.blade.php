<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- react_cdn -->
    <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>

    <!-- babel -->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            margin: 40px;   /* 外側の余白を40pxにする */
            padding: 0;
        }
    </style>
</head>
<body>


    <div id="root"></div>
    <script type="text/babel">

    const useState = React.useState;
    const useEffect = React.useEffect;

    // 関数コンポーネントの利用
    const Component_first = () => {
        const style_1 = {
            display: "block",
            fontWeight: "bold",
            backgroundColor: "#88FFFF",
            padding: "10px",
            display: "inline-block",
        };

        return (
            <>
            <p style={style_1}>Reactの基礎構文：cdnの利用：bootstrapの利用</p>
            </>
        );
    }


    const CountComponent = () => {

    //初回のみ実行
    // useEffect(() => {
    //     console.log('useEffectが実行されました');
    // },[]);
    //コンポーネントが呼び出されるたび実行
    // useEffect(() => {
    //     console.log('useEffectが実行されました');
    // });

    const [state, setState] = useState(0);

    //指定した値が変化するたびに実行
    useEffect(() => {
        console.log(state+'回目のuseEffectが実行されました');
    },[state]);

    const handleClick = () => setState(state + 1);

    return (
        <div>
        カウント: {state}
        <div>
            <button class="btn btn-outline-primary" onClick={handleClick}>count up</button>
        </div>
        </div>
    )
    }


    const ValueComponent = (props) => {

        return(
            <>
                <p>{props.text}</p>
            </>
        );
    }

    const ObjectComponent = () =>{

        const [member, setMember] = useState({ name: "", number: "" });
        //オブジェクトを配列として保存するための宣言
        const [users, setUsers] = useState([]);

        const set_function_1 = (e) =>{
            //オブジェクトの分割代入
            setMember({ ...member, name: e.target.value });
        }
        const set_function_2 = (e) =>{
            setMember({ ...member,number: e.target.value });
        }

        const set_function_3 = (e) =>{
            setUsers([...users,member]);
        }

        const list = users.map((user) => <li>{user.name}:{user.number}</li>);

        const input_style = {
            width: "20%",
        };

        return(

        <>
        <input style={input_style} class="form-control" type="text" onChange={set_function_1} /><br/>
        <input style={input_style} class="form-control" type="text" onChange={set_function_2} />

        <p>{ member.name }</p>
        <p>{ member.number }</p>

        <button class="btn btn-secondary btn-lg" onClick={set_function_3}>上記の値にて配列で保存</button>
        <ul>{list}</ul>



        </>

        );

    }




    const App = () => {


    const test_value = 'props_argument';
    return (
        //コンポーネント呼び出し
        <>
        <Component_first />
        <CountComponent />
        <ValueComponent text={test_value} />
        <ObjectComponent />
        </>
    );
    }


const container = document.getElementById("root");
const root = ReactDOM.createRoot(container);
root.render(<App />);




    </script>
</body>

</body>

</html>
