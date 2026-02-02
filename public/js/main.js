'use strict';

{
    const guideOpen = document.querySelector('#guide-open');
    const guideText = document.querySelector('#guide-text');
    const guideClose = document.querySelector('#guide-close');
    const mask = document.querySelector('#mask');

    const table = document.querySelector('table tbody');
    const makerButtons = document.querySelectorAll('[data-bymaker]');
    const dataSorts = document.querySelectorAll('[data-sort]');
    const ccButtons = document.querySelectorAll('[data-bycc]');
    const rows = document.querySelectorAll('table tbody tr');


    // 共通・フィルタの適用
    function applyFilters() {
        // active maker
        const activeMakers = [...makerButtons]
                .filter(btn => btn.classList.contains('active'))
                .map(btn => btn.dataset.bymaker);

        const activeCc = [...ccButtons]
                .filter(btn => btn.classList.contains('active'))
                .map(btn => btn.dataset.bycc);

        rows.forEach(row => {

            if (activeMakers.length === 0 && activeCc.length > 0) {
                row.style.display = "none";
                return;
            }

            const maker = row.querySelector('[data-maker]').dataset.maker;
            const cc = row.querySelector('[data-engine-displacement').dataset.engineDisplacement;
            const car_model = row.querySelector('[data-car-model').dataset.carModel;
            let visible = true;

            //----- メーカー判定 -----//
            if(activeMakers.length > 0 && !activeMakers.includes(maker)) {
                visible = false;
            }

            //----- 排気量判定 -----//
            let shouldHide = true;

            if(!activeCc.includes("over400") && cc > 400) {
                    shouldHide = false;
                }
                if (!activeCc.includes("251-400") && cc > 250 && cc <= 400) {
                    shouldHide = false;
                }
                if (!activeCc.includes("126-250") && cc > 125 && cc <= 250) {
                    shouldHide = false;
                }
                if (!activeCc.includes("51-125") && cc > 50 && cc <= 125 && !car_model.includes('原付')) {
                    shouldHide = false;
                }
                if (!activeCc.includes("under50") && cc <= 50 ) {
                    shouldHide = false;
                }
                if (!activeCc.includes("new-standard") && car_model.includes('原付')) {
                    shouldHide = false;
                }
                    row.style.display = visible && shouldHide ? "" : "none";
        });
    }

    // 使い方ガイドの表示
    guideOpen.addEventListener('click', () => {
        guideText.classList.remove('hidden');
        mask.classList.remove('hidden');
    });

    guideClose.addEventListener('click', () => {
        guideText.classList.add('hidden');
        mask.classList.add('hidden');
    });

    mask.addEventListener('click', () => {
        guideClose.click();
    });
    
    
    // // メーカー別ボタンの設定
    makerButtons.forEach(button => {
        button.addEventListener('click', () => {

            // ボタンの切り替え
            button.classList.toggle('active');
            applyFilters();       
        });
    });

    // // 排気量別ボタンの処理
    ccButtons.forEach(button => {
        button.addEventListener('click', () => {
    
            //ボタン切り替え
            button.classList.toggle('active');
            applyFilters();
        });
    });
    

    // テーブルの題目をクリックして並び替えの処理
    dataSorts.forEach(dataSort => {
        dataSort.addEventListener('click', () => {

            const sortKey = dataSort.dataset.sort;
            const rows = Array.from(table.querySelectorAll('tr'));


            //　昇順か降順をセットし保存
            const currentOrder = dataSort.dataset.order === 'asc' ? 'asc' : 'desc';
            const newOrder = currentOrder === 'asc' ? 'desc' : 'asc';
            dataSort.dataset.order = newOrder;

            
            dataSorts.forEach(dataSort => {
                dataSort.classList.remove("asc", "desc");
            });
            
            // console.log(dataSort.dataset.order);
            if (dataSort.dataset.order == "asc") {
                
                dataSort.classList.add("asc");
            } else {
                
                dataSort.classList.add("desc");
            }

            //　並び替え
            const sorted = rows.sort((a, b) => {
                const aCell = a.querySelector(`[data-${sortKey}]`);
                const bCell = b.querySelector(`[data-${sortKey}]`);

                // データがなければ並び替えなし
                if(!aCell || !bCell) return 0;

                // データ型をキャメルケースに変換
                const toCamelKey = sortKey.replace(/-([a-z])/g, (match, c) => c.toUpperCase());
                const aValue = parseFloat(aCell.dataset[toCamelKey]);
                const bValue = parseFloat(bCell.dataset[toCamelKey]);

                // console.log(aValue);

                if(dataSort.dataset.order === 'asc') {
                    return aValue - bValue;
                } else {
                    return bValue - aValue;
                }
            });

            // 並び替えたものを再表示
            sorted.forEach(row => {
                table.appendChild(row);
            });
        });
    });

}